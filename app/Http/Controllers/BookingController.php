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

            'sender_contact_name' => $shipmentDetails->senderContactName,
            'sender_company_name' => $shipmentDetails->senderCompanyName,
            'sender_phone' => $shipmentDetails->senderPhone,
            'sender_address_line_1' => $shipmentDetails->senderAddressLine1,
            'sender_address_line_2' => $shipmentDetails->senderAddressLine2,
            'sender_address_line_3' => $shipmentDetails->senderAddressLine3,
            'sender_town' => $shipmentDetails->senderTown,
            'sender_postcode' => $shipmentDetails->senderPostcode,
            'sender_country_id' => Country::where('code', $shipmentDetails->senderCountryCode)->first()->id,

            'recipient_contact_name' => $shipmentDetails->recipientContactName,
            'recipient_company_name' => $shipmentDetails->recipientCompanyName,
            'recipient_phone' => $shipmentDetails->recipientPhone,
            'recipient_address_line_1' => $shipmentDetails->recipientAddressLine1,
            'recipient_address_line_2' => $shipmentDetails->recipientAddressLine2,
            'recipient_address_line_3' => $shipmentDetails->recipientAddressLine3,
            'recipient_town' => $shipmentDetails->recipientTown,
            'recipient_postcode' => $shipmentDetails->recipientPostcode,
            'recipient_country_id' => Country::where('code', $shipmentDetails->recipientCountryCode)->first()->id,
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

//            dd('BookingController->confirmBooking()', $shipmentRequestResult);

            if ($shipmentRequestResult->status == "success") {
//                $pdf_base64 = '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OTNdPj4KZW5kb2JqCjYgMCBvYmoKPDwvS2lkc1sxIDAgUiA3IDAgUiAxMiAwIFJdL1R5cGUvUGFnZXMvQ291bnQgMy9JVFhUKDIuMS43KT4+CmVuZG9iagoxNyAwIG9iago8PC9UeXBlL0NhdGFsb2cvUGFnZXMgNiAwIFI+PgplbmRvYmoKMTggMCBvYmoKPDwvTW9kRGF0ZShEOjIwMTkwNDE2MTU0MzA5WikvQ3JlYXRpb25EYXRlKEQ6MjAxOTA0MTYxNTQzMDlaKS9Qcm9kdWNlcihpVGV4dCAyLjEuNyBieSAxVDNYVCk+PgplbmRvYmoKeHJlZgowIDE5CjAwMDAwMDAwMDAgNjU1MzUgZiAKMDAwMDAwNDc3OCAwMDAwMCBuIAowMDAwMDAwMDE1IDAwMDAwIG4gCjAwMDAwMDAzMTMgMDAwMDAgbiAKMDAwMDAwMDEzMiAwMDAwMCBuIAowMDAwMDAwMjI1IDAwMDAwIG4gCjAwMDAwMTM1MTMgMDAwMDAgbiAKMDAwMDAwOTcwOCAwMDAwMCBuIAowMDAwMDA0OTQwIDAwMDAwIG4gCjAwMDAwMDUyNDAgMDAwMDAgbiAKMDAwMDAwNTA1NyAwMDAwMCBuIAowMDAwMDA1MTUxIDAwMDAwIG4gCjAwMDAwMTMzNDggMDAwMDAgbiAKMDAwMDAwOTg3MCAwMDAwMCBuIAowMDAwMDEwMTcxIDAwMDAwIG4gCjAwMDAwMDk5ODggMDAwMDAgbiAKMDAwMDAxMDA4MiAwMDAwMCBuIAowMDAwMDEzNTg5IDAwMDAwIG4gCjAwMDAwMTM2MzUgMDAwMDAgbiAKdHJhaWxlcgo8PC9JbmZvIDE4IDAgUi9JRCBbPGJlMTdkM2VkZTYyODU1NDFmNGE0MzgwZjlmZjNjYjFkPjwxNDZmYzMzNDJmYWYyMDgxYWZiNGJhY2MzYTgxZmQwYj5dL1Jvb3QgMTcgMCBSL1NpemUgMTk+PgpzdGFydHhyZWYKMTM3NDYKJSVFT0YK';
//                $pdf_base64 = $shipment->label_image;
//                $pdf_decoded = base64_decode($pdf_base64);
//                Storage::disk('local')->put('labels/file.pdf', $pdf_decoded);
            }
            $shipmentUuids[] = $shipment->uuid;
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

        $storagePath = storage_path();
//        dd($storagePath);
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
        $capability = [];
        foreach ($this->carriers as $carrier) {
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
