<?php

namespace App\Carriers\HERMES;

use App\Models\Responses\ShipmentRequestResult;
use App\Models\Responses\TrackingRequestResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Responses\ServiceRequestResult;
use App\Contracts\CarrierInterface as Carrier;
use App\Models\Service;
use App\Models\Country;
use App\Models\SalesTariffValues;

class HERMES extends Model implements Carrier
{
    public $name = 'HERMES';
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function requestAvailableServices($request, int $customerId) : ServiceRequestResult
    {
        $r = new HermesDetermineDeliveryRouting();
        $r->buildRequestBody($request);
        $response = $r->send();
        // dd('herm', $response->routingResponseEntries->routingResponseEntry->serviceDescriptions);

        $routingResponseEntry = $response->routingResponseEntries->routingResponseEntry; 

        // foreach ($routingResponseEntry as $entry) {
        //     print_r('<pre>');
        //     print_r('--');
        //     print_r($entry);
        //     print_r('</pre>');
        // }
        // dd($routingResponseEntry);

        $availableServices = $this->availableServices();


//        $temp->short_name = 'Hermes test short name';
//        $temp->est_delivery = 'Hermes test delivery date';
//        $temp->latest_booking = 'Hermes test latest booking';
//        $temp->product_code = 'Hermes test product code';
//        $temp->price = '7357';
//        $temp->carrier = 'Hermes';
//        $data[] = $temp;
        $services = [];
        // $srv = new Service;
        // $srv->capability = [
        //     'short_name' => 'Hermes test short name',
        //     'est_delivery' => 'Hermes test delivery date',
        //     'latest_booking' => 'Hermes test latest booking',
        //     'product_code' => 'NDAY',
        //     'price' => '7357',
        //     'carrier' => 'Hermes'
        // ];

        // placeholder for now
        // Calculate chargable weight
        $totalChargeableWeight = 2.6;

        foreach ($availableServices as $service) {
            $service->getCustomerSalesTariff($customerId);
            $countryId = Country::where('code', $request['recipientCountryCode'])->first()->id;
            $service->zone = $service->applicableSalesTariff->countryZones->where('country_id', $countryId)->first()->zone;
            $service->tariffValue = SalesTariffValues::where(
                [
                    ['sales_tariff_id', $service->applicableSalesTariff->id],
                    ['zone', $service->zone],
                    ['documents', (isset($request['documents']) && $request['documents'] === "on") ? 1 : 0],
                    ['weight', '>=', $totalChargeableWeight],
                    ['weight', '<', ($totalChargeableWeight+0.5)]
                ]
            )->first();
            // dd($service);

            $service->capability = [
                'short_name' => ucfirst($service->short_name),
                'est_delivery' => 'Whenever',
                'latest_booking' => 'today',
                'product_code' => $service->product_code,
                'price' => number_format($service->tariffValue->amount, 2),
                'carrier' => 'HERMES'
            ];

            $services[] = $service;
        }

        return new ServiceRequestResult($services);
    }

    public function requestShipment($request) : ShipmentRequestResult
    {

    }

    public function requestTrackingData($request) : TrackingRequestResult {

    }

    public function name() : string
    {
        return $this->name;
    }


    /**
     * Private methods
     */

    /**
     * Filter out the services we don't offer
     * @return array
     */
    private function availableServices() : array
    {
        $availableServices = [];
        $availableServices[] = Service::where(['product_code' => 'H1'])
            ->with('defaultSalesTariff')
            ->first();
        return $availableServices;
    }
}
