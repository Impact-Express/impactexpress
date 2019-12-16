<?php

namespace App\Carriers\DHL;

use App\Models\SalesTariffValues;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Contracts\CarrierInterface;
use App\Models\Country;
use App\Models\Piece;
use App\Models\Service;
use App\Models\Responses\ServiceRequestResult;
use App\Models\Responses\ShipmentRequestResult;
use App\Models\Responses\TrackingRequestResult;

class DHL extends Model implements CarrierInterface
{
    public $name = 'DHL';
    private $id;

    public function __construct($id)
    {
        parent::__construct();
//        $this->model = Carrier::find($id);
        $this->id = $id;
    }

    public function requestAvailableServices($request, int $customerId) : ServiceRequestResult
    {
        $rateRequest = $this->newRateRequest();
        $rateRequest->buildRequestBody($request);
        $response = $rateRequest->send();

        $services = $response->RateResponse->Provider[0]->Service;
        // if there is only one result, it is returned as an object. Multiple results are returned in an array
        if (!is_array($services)) {
            $services = array($services);
        }
//dd($services);
        $availableServices = $this->availableServices($services); // returns object or array, which is lame
//dd($availableServices);
        //  calculate the applicable weight of the parcels
        $parcels = $this->calculateApplicableWeights($request['parcels']);
        $totalChargeableWeight = 0;
        foreach ($parcels as $parcel) {
            $totalChargeableWeight += $parcel['applicableWeight'];
        }

        // for each of the services, get the customer's tariff value
        $services = [];
        foreach ($availableServices as $service) {
            $srv = $this->createServiceFromAPIResponse($service);
            $srv->getCustomerSalesTariff($customerId);
// dd($srv);
            // and get the zone for the country as used by given tariff
            $countryId = Country::where('code', $request['recipientCountryCode'])->first()->id;
            $srv->zone = $srv->applicableSalesTariff->countryZones->where('country_id', $countryId)->first()->zone;

            $srv->tariffValue = SalesTariffValues::where(
                [
                    ['sales_tariff_id', $srv->applicableSalesTariff->id],
                    ['zone', $srv->zone],
                    ['documents', (isset($request['documents']) && $request['documents'] === "on") ? 1 : 0],
                    ['weight', '>=', $totalChargeableWeight],
                    ['weight', '<', ($totalChargeableWeight+0.5)]
                ]
            )->first();
//dd($service);
            // determine any surcharges applicable to this shipment
            //      Special delivery by 9 (1030 usa)    per shipment E(M) K(L) - DOCS
            //      Special delivery by 12  per shipment Y   T - DOCS
            //      Saturday delivery   per shipment
            //      Insurance => calculate from value of goods £18 or 3% of value

            //      Fuel => provided by api per shipment : FUEL SURCHARGE

            //      Remote area => provided by api  per shipment

            //      Oversize => provided by api £70 per piece : OVERSIZE PIECE (DIMENSION)

            //      Non stack => designated by customer per piece

            //      Full DG per shipment
            //      Various Li Battery charges  per shipment
            //      Excepted quantities per shipment    per shipment
            //      Dry Ice => designated by customer   per shipment
            //      Restricted destination => determine from address    per shipment
            //      Elevated risk ? destination per shipment
            //      Exporter validation ? destination   per shipment
            //  format for view

            $charges = $this->calculateCharges($srv);
            $srv->chargeAmount = 0;
            foreach ($charges as $charge => $value) {
                switch ($charge) { // TODO: ALERT! MASSIVE SWITCH STATEMENT! MAY NEED TO BE SEPARATED OUT TO A DEDICATED CONTROLLER FOR CHARGES
                    case "10:30 PREMIUM":
                    case "09:30 PREMIUM":
                    case "9:30 PREMIUM":
                        $srv->chargeAmount += 20;
                        break;
                    case "12:00 PREMIUM":
                        $srv->chargeAmount += 10;
                        break;
                    case "FUEL SURCHARGE":
                        $srv->fuelSurcharge = $value;
                        $srv->chargeAmount += $value;
                        break;
                    case "OVERSIZE PIECE (DIMENSION)":
                        $srv->oversizeSurcharge = $value;
                        $srv->chargeAmount += $value;
                        break;
                }
            }

//dd($charges);
            $srv->capability = [
                'short_name' => ucfirst($srv->short_name),
                'raw_est_delivery' => $srv->apiData->DeliveryTime,
                'raw_latest_booking' => $srv->apiData->CutoffTime,
                'est_delivery' => $this->convertDHLTimesToHuman($srv->apiData->DeliveryTime, false),
                'latest_booking' => $this->convertDHLTimesToHuman($srv->apiData->CutoffTime, true),
                'product_code' => $srv->product_code,
                'price' => number_format($srv->tariffValue->amount + $srv->chargeAmount, 2),
                'carrier' => 'DHL'
            ];

            $services[] = $srv;
        }

        return new ServiceRequestResult($services);
    }

    public function requestShipment($request) : ShipmentRequestResult
    {
        $shipmentRequest = new DHLGLOWSShipmentRequest;
        $shipmentRequest->buildRequestBody($request);
        $response = $shipmentRequest->send();
        $shipmentRequestResult = new ShipmentRequestResult();
//dd($response);
        $status = $response->ShipmentResponse->Notification[0]->{'@code'} == "0" ? 'success' : 'error';

        if ($status == 'success') {
            $shipmentRequestResult->status = $status;
            $shipmentRequestResult->labelImage = $response->ShipmentResponse->LabelImage[0]->GraphicImage;
            $shipmentRequestResult->airwaybillNumber = $response->ShipmentResponse->ShipmentIdentificationNumber;

            foreach ($response->ShipmentResponse->PackagesResult->PackageResult as $pkg) {
                $pieceNumber = $pkg->{'@number'};
                $shipmentRequestResult->pieces[$pieceNumber] = [
                    'pieceNumber' => $pieceNumber,
                    'trackingNumber' => $pkg->TrackingNumber
                ];
            }

        } else {
            $shipmentRequestResult->status = $status;
            $shipmentRequestResult->errorCode = $response->ShipmentResponse->Notification[0]->{'@code'};
            $shipmentRequestResult->errorMessage = $response->ShipmentResponse->Notification[0]->Message;
        }


//        dd('DHL', $response, $shipmentRequestResult);
        return $shipmentRequestResult;
    }

    public function requestTrackingData($request) : TrackingRequestResult {

        $tracking = new DHLGLOWSTracking();
        $tracking->buildRequestBody($request);
        $tr = $tracking->send();
dd($tr);
        $t = $tr->trackShipmentRequestResponse->trackingResponse->TrackingResponse;
//dd($tr);
        $trackingRequestResult = new TrackingRequestResult();
        $trackingRequestResult->shipmentRef = $t->AWBInfo->ArrayOfAWBInfoItem->ShipmentInfo->ShipperReference->ReferenceID;
        $trackingRequestResult->consigneeName = $t->AWBInfo->ArrayOfAWBInfoItem->ShipmentInfo->ConsigneeName;
        $trackingRequestResult->numberOfPieces = $t->AWBInfo->ArrayOfAWBInfoItem->ShipmentInfo->Pieces;

        return $trackingRequestResult;
    }

//    private function id(): int
//    {
//        return $this->id;
//    }

    public function name() : string
    {
        return $this->name;
    }

    /**
     * Private Methods
     */

    private function createServiceFromAPIResponse($s) {
        $service = Service::where(['product_code' => $s->{'@type'}])
            ->with('defaultSalesTariff')
            ->first();
        $service->apiData = $s;
        return $service;
    }

    /**
     * Organise the charges given in a service object into a nice array
     * @param $service
     * @return $charges
     */
    private function calculateCharges(Service $service) : array {
        $cs = $service->apiData->Charges->Charge;
        $charges = [];
        foreach ($cs as $c) {
            $charges[$c->ChargeType] = $c->ChargeAmount;
        }
        return $charges;
    }

    /**
     * Filter out the services we don't offer, e.g. Medical Express
     * @param $services
     * @return array
     */
    private function availableServices(array $services) : array
    {
        $availableServices = array_filter($services, function($s) {
            // For each of the services, grab the DB record if it exists, and return based on its existence.
            $service = DB::table('services')->where('product_code', $s->{'@type'})->first();
            return !empty($service) ? true : false;
        });
        // dd($availableServices);
        return $availableServices;
    }

    /**
     * Calculate the the weight used to determine the tariff used
     * Whichever is greater of dead weight and volumetric weight
     * @param array $parcels
     * @return array parcels with applicable weights
     */
    private function calculateApplicableWeights(array $parcels) : array
    {
        $parcelsWithWeights = array_map(function($parcel) {
            $dims = [
                'length' => $parcel['length'],
                'width' => $parcel['width'],
                'height' => $parcel['height']
            ];
            $parcel['volumetricWeight'] = Piece::calculateVolumetricWeight($dims);
            $parcel['applicableWeight'] = $parcel['volumetricWeight'] > $parcel['weight'] ? $parcel['volumetricWeight'] : $parcel['weight'];
            return $parcel;
        }, $parcels);
        return $parcelsWithWeights;
    }

    /**
     *  Return the date in the desired format
     *  @param String $dateTimeString DateTime string returned by the DHL api in the format Y-m-dTH:i:s
     *  @param Bool $includeTime Whether or not you want the time to be included in the returned sting
     *  @return String Date[Time] sting in the format l jS F[ H:i]
     */
    private function convertDHLTimesToHuman(string $dateTimeString, bool $includeTime) : string
    {
        // Get rid of the T
        $dt = explode('T',$dateTimeString);
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $dt[0].' '.$dt[1]);
        return $includeTime ? $dt->format('l jS F H:i') : $dt->format('l jS F');
    }

    private function newRateRequest() : DHLGLOWSRateRequest
    {
        return new DHLGLOWSRateRequest;
    }
}
