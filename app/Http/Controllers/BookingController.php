<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Shipment;
use App\Models\Carrier;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    private $carriers = [];

    public function index()
    {
//        Shipment::deleteIncompleteShipments();

        $addresses = Auth::user()->addresses;

        return view('customer.booking.index', compact('addresses'));
    }

    public function rateRequest(Request $request)
    {
        $capability = $this->requestAvailableServices($request->all(), auth()->id());

        session()->flash('shipment_json', json_encode($request->all()));
        session()->flash('capability', json_encode($capability));

        return view('customer.booking.chooseService', compact('capability'));
    }


    public function chooseService(Request $request)
    {
        $shipmentDetails = json_decode(session('shipment_json'));
        $service = json_decode(session('capability'))[$request->input('service')];
// dd($shipmentDetails);
        // now create a shipment with status of incomplete(default)
        Shipment::createWithPieces([
            'user_id' => auth()->id(),
            'date' => $shipmentDetails->date,
            'carrier_id' => $service->carrier_id,
            'service_id' => $service->id,
            'documents' => isset($shipmentDetails->documents) && $shipmentDetails->documents === "on" ? 1 : 0,
            'description' => $shipmentDetails->description,
            'declared_value' => $shipmentDetails->declaredValue,
            'price' => $service->capability->price,

            'sender_contact_title' => $shipmentDetails->senderContactTitle,
            'sender_contact_first_name' => $shipmentDetails->senderContactFirstName,
            'sender_contact_last_name' => $shipmentDetails->senderContactLastName,
            'sender_company_name' => $shipmentDetails->senderCompanyName,
            'sender_house_no' => $shipmentDetails->senderHouseNumber,
            'sender_house_name' => $shipmentDetails->senderHouseName,
            'sender_street_name' => $shipmentDetails->senderStreetName,
            'sender_address_line_1' => $shipmentDetails->senderAddressLine1,
            'sender_address_line_2' => $shipmentDetails->senderAddressLine2,
            'sender_address_line_3' => $shipmentDetails->senderAddressLine3,
            'sender_town' => $shipmentDetails->senderTown,
            'sender_country_code' => $shipmentDetails->senderCountryCode,
            'sender_postcode' => $shipmentDetails->senderPostcode,
            'sender_home_phone' => $shipmentDetails->senderHomePhone,
            'sender_work_phone' => $shipmentDetails->senderWorkPhone,
            'sender_mobile_phone' => $shipmentDetails->senderMobilePhone,

            'recipient_contact_title' => $shipmentDetails->recipientContactTitle,
            'recipient_contact_first_name' => $shipmentDetails->recipientContactFirstName,
            'recipient_contact_last_name' => $shipmentDetails->recipientContactLastName,
            'recipient_company_name' => $shipmentDetails->recipientCompanyName,
            'recipient_house_no' => $shipmentDetails->recipientHouseNumber,
            'recipient_house_name' => $shipmentDetails->recipientHouseName,
            'recipient_street_name' => $shipmentDetails->recipientStreetName,
            'recipient_address_line_1' => $shipmentDetails->recipientAddressLine1,
            'recipient_address_line_2' => $shipmentDetails->recipientAddressLine2,
            'recipient_address_line_3' => $shipmentDetails->recipientAddressLine3,
            'recipient_town' => $shipmentDetails->recipientTown,
            'recipient_country_code' => $shipmentDetails->recipientCountryCode,
            'recipient_postcode' => $shipmentDetails->recipientPostcode,
            'recipient_home_phone' => $shipmentDetails->recipientHomePhone,
            'recipient_work_phone' => $shipmentDetails->recipientWorkPhone,
            'recipient_mobile_phone' => $shipmentDetails->recipientMobilePhone,
            
            'pieces' => $shipmentDetails->parcels
        ]);

        return redirect()->route('review-shipments');
    }

    public function reviewShipments()
    {
        $userId = auth()->id();

        // get all shipments and format data for presentation
        $shipments = Shipment::where([
            'user_id' => $userId,
            'status_id' => 1
        ])->get();

        // calculate final price
        $totalPrice = 0;
        foreach ($shipments as $shipment) {
            $totalPrice += $shipment->price;
        }

        return view('customer.booking.reviewShipments', compact('shipments', 'totalPrice'));
    }

    public function confirmBooking()
    {
        $userId = auth()->id();

        $shipments = Shipment::where([
            'user_id' => $userId,
            'status_id' => 1
        ])->get();

        $shipmentUuids = [];

        foreach ($shipments as $shipment) {

            $shipmentRequestResult = $shipment->requestShipmentBooking();

            if ($shipmentRequestResult->status == "success") {
                $shipmentUuids[] = $shipment->uuid;
            }
        }
        session()->flash('shipmentUuids', json_encode($shipmentUuids));

        return redirect(route('booking.confirmation'));
    }


    public function bookingConfirmation()
    {
        $shipmentUuids = json_decode(session('shipmentUuids'));
        if (!$shipmentUuids) {
            abort(404);
        }
        $shipments = Shipment::whereIn('uuid', $shipmentUuids)->with('pieces')->get();
        return view('customer.booking.confirmation', compact('shipments', 'storagePath'));
    }


    private function getService() : Service
    {
        return new Service();
    }


    /**
     * This method calls Carrier::requestAvailableServices() on each of the active carriers
     * @param $request
     * @param $customerId
     * @return array
     */
    public function requestAvailableServices($request, int $customerId) : array {
//        $this->loadActiveCarriersWithAPI();
        $this->carriers = Carrier::getActiveCarriers();
        
        $largestWeight = 0;
        foreach ($request['parcels'] as $pa) {
            if ($pa['weight'] > $largestWeight) {
                $largestWeight = $pa['weight'];
            }
        }

        $capability = [];
        foreach ($this->carriers as $carrier) {

            // Hermes don't deliver over 15kg
            if ($largestWeight > 15 && $carrier->name == 'HERMES') continue; // this stinks, seriously, change it!

            $capability[$carrier->name] = $carrier->api()->requestAvailableServices($request, $customerId);
        }
        $capability = $this->aggregateResults($capability);

        return $capability;
    }

    private function aggregateResults(array $capability) : array {
        $a = [];
        foreach ($capability as $services)
        {
            $a = array_merge($a, $services->data());
        }
        return $a;
    }

    /**TODO: remove this entirely
     * Load the active carriers
     * TODO: this should be in the carrier class as a factory method
     */
    private function loadActiveCarriersWithAPI() {
        $carriers =  Carrier::getActiveCarriers();

//        foreach ($carriers as $carrier) {
//            $class = "App\Carriers\\$carrier->name\\$carrier->name";
//            $this->carriers[] = new $class($carrier->id);
//        }
        // TODO: this could, and probably should, be done in the Carrier class constructor
        foreach ($carriers as $carrier) {
//            $apiClass = "App\Carriers\\$carrier->name\\$carrier->name";
//            $carrier->api = new $apiClass($carrier->id);
            $this->carriers[] = $carrier;
        }
    }
}
