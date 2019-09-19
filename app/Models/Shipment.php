<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use App\Models\Responses\TrackingRequestResult;

class Shipment extends Model
{
    use GeneratesUuid;

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function requestShipmentBooking() {
        $accountNumber = $this->leastCostRouting();
        $shipmentRef =  $this->generateReference();
        $shipmentRequestResult = $this->carrier->api()->requestShipment([
            'dropOffType' => 'REGULAR_PICKUP',
            'serviceCode' => $this->service->product_code, // ??
            'accountNumber' => $accountNumber,
            'shipmentRef' => $shipmentRef,
            'shipTime' => $this->date,
            'numberOfPieces' => 2,//count($this->pieces),
            'description' => $this->description,
            'customsValue' => $this->declared_value,
            'content' => $this->documents == "0" ? "NON_DOCUMENTS" : "DOCUMENTS",
            'senderPersonName' => $this->sender_contact_name,
            'senderCompanyName' => $this->sender_company_name,
            'senderPhone' => $this->sender_phone,
            'senderAddressLine1' => $this->sender_address_line_1,
            'senderAddressLine2' => $this->sender_address_line_2,
            'senderAddressLine3' => $this->sender_address_line_3,
            'senderCity' => $this->sender_town,
            'senderPostcode' => $this->sender_postcode,
            'senderCountryCode' => $this->senderCountry->code,
            'recipientPersonName' => $this->recipient_contact_name,
            'recipientCompanyName' => $this->recipient_company_name,
            'recipientPhone' => $this->recipient_phone,
            'recipientAddressLine1' => $this->recipient_address_line_1,
            'recipientAddressLine2' => $this->recipient_address_line_2,
            'recipientAddressLine3' => $this->recipient_address_line_3,
            'recipientCity' => $this->recipient_town,
            'recipientPostcode' => $this->recipient_postcode,
            'recipientCountryCode' => $this->recipientCountry->code,
            'parcels' => $this->pieces,
        ]);

//        dd('shipment->requestShipmentBooking()', $shipmentRequestResult);

        if ($shipmentRequestResult->status == 'error') {
            dd('$shipmentRequestResult->status == error', $shipmentRequestResult);
        } elseif ($shipmentRequestResult->status == 'success') {

            $this->shipment_ref = $shipmentRef;
            $this->airwaybill_number = $shipmentRequestResult->airwaybillNumber;
            $this->label_image = $shipmentRequestResult->labelImage;

            $this->status_id = 2;
            $this->save();
        }

        return $shipmentRequestResult;
    }

    public static function createWithPieces(array $params) : Shipment
    {
        $shipment = new self;
        $shipment->user_id = $params['user_id'];
        $shipment->date = $params['date'];
        $shipment->carrier_id = $params['carrier_id'];
        $shipment->service_id = $params['service_id'];
        $shipment->documents = $params['documents'];
        $shipment->description = $params['description'];
        $shipment->declared_value = $params['declared_value'];
        $shipment->price = $params['price'];
        $shipment->sender_contact_name = $params['sender_contact_name'];
        $shipment->sender_company_name = $params['sender_company_name'];
        $shipment->sender_phone = $params['sender_phone'];
        $shipment->sender_address_line_1 = $params['sender_address_line_1'];
        $shipment->sender_address_line_2 = $params['sender_address_line_2'];
        $shipment->sender_address_line_3 = $params['sender_address_line_3'];
        $shipment->sender_town = $params['sender_town'];
        $shipment->sender_postcode = $params['sender_postcode'];
        $shipment->sender_country_id = $params['sender_country_id'];
        $shipment->recipient_contact_name = $params['recipient_contact_name'];
        $shipment->recipient_company_name = $params['recipient_company_name'];
        $shipment->recipient_phone = $params['recipient_phone'];
        $shipment->recipient_address_line_1 = $params['recipient_address_line_1'];
        $shipment->recipient_address_line_2 = $params['recipient_address_line_2'];
        $shipment->recipient_address_line_3 = $params['recipient_address_line_3'];
        $shipment->recipient_town = $params['recipient_town'];
        $shipment->recipient_postcode = $params['recipient_postcode'];
        $shipment->recipient_country_id = $params['recipient_country_id'];
        $shipment->save();

        foreach ($params['pieces'] as $num => $piece) {
            Piece::createPiece($shipment->id, $piece, $num);
        }

        return $shipment;
    }

    public function requestTrackingData() : TrackingRequestResult {
        return $this->carrier->api()->requestTrackingData($this->airwaybill_number);
    }

    public function setStatus(String $status)
    {
        $this->status_id = ShipmentStatus::where('status', $status)->first()->id;
        return true;
    }

    public function leastCostRouting()
    {
        // set and save to bb
        return '139165658';
    }

    /**
     * Deletes a shipment along with it's constituent pieces
     */
    public function deleteShipment()
    {
        $shipment = self::where('uuid', $this->uuid)->first();
        foreach ($shipment->pieces as $piece) {
            $piece->delete();
        }
        $shipment->delete();
    }

    public function generateReference()
    {
        // TODO: random for now, decide on a scheme later
        $r1 = rand(10000, 32700);
        $r2 = rand(10000, 32700);

         return 'IE'.$r1.$r2;
    }

    /**
     * Define relationships
     */
    public function accountNumber()
    {
        return $this->belongsTo(AccountNumber::class, 'account_number_id');
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

    public function senderCountry()
    {
        return $this->belongsTo(Country::class, 'sender_country_id');
    }

    public function recipientCountry()
    {
        return $this->belongsTo(Country::class, 'recipient_country_id');
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }
}
