<?php

namespace App\Carriers\LANDMARKGLOBAL;

use App\Models\Responses\ShipmentRequestResult;
use App\Models\Responses\TrackingRequestResult;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responses\ServiceRequestResult;
use App\Contracts\CarrierInterface as Carrier;
use App\Models\Service;


class LANDMARKGLOBAL extends Model implements Carrier
{
    public $name = 'LANDMARKGLOBAL';
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function requestAvailableServices($request, int $customerId) : ServiceRequestResult
    {
//        $temp->short_name = 'Landmark Global test short name';
//        $temp->est_delivery = 'Landmark Global test delivery date';
//        $temp->latest_booking = 'Landmark Global test latest booking';
//        $temp->product_code = 'Landmark Global test product code';
//        $temp->price = '7357';
//        $temp->carrier = 'Landmark Global';
//        $data[] = $temp;
        $services = [];
        $srv = new Service;
        $srv->capability = [
            'short_name' => 'Landmark Global test short name',
            'est_delivery' => 'Landmark Global test delivery date',
            'latest_booking' => 'Landmark Global test latest booking',
            'product_code' => 'Landmark Global test product code',
            'price' => '7357',
            'carrier' => 'Landmark Global'
        ];

        $services[] = $srv;
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
}