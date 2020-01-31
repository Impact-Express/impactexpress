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
        $shipmentRequestResult = $this->carrier->api()->requestShipment($this);

        if ($shipmentRequestResult->status == 'error') {
            dd('$shipmentRequestResult->status == error', $shipmentRequestResult);
        } else if ($shipmentRequestResult->status == 'success') {

            // $this->shipment_ref = $shipmentRequestResult->shipmentRef;
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
        // $shipment->user_id = $params['user_id'];
        // $shipment->date = $params['date'];
        // $shipment->carrier_id = $params['carrier_id'];
        // $shipment->service_id = $params['service_id'];
        // $shipment->documents = $params['documents'];
        // $shipment->description = $params['description'];
        // $shipment->declared_value = $params['declared_value'];
        // $shipment->price = $params['price'];
        
        // $shipment->sender_contact_title = $params['sender_contact_title'];
        // $shipment->sender_contact_first_name = $params['sender_contact_first_name'];
        // $shipment->sender_contact_last_name = $params['sender_contact_last_name'];
        // $shipment->sender_company_name = $params['sender_company_name'];
        // $shipment->sender_company_name = $params['sender_company_name'];

        foreach ($params as $key => $value) {
            if ($key == 'pieces') continue;
            $shipment->$key = $value;
        }

        $shipment->shipment_ref = $shipment->generateReference();

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
