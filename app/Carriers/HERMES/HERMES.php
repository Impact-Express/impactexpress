<?php

namespace App\Carriers\HERMES;

use App\Models\Responses\ShipmentRequestResult;
use App\Models\Responses\TrackingRequestResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Responses\ServiceRequestResult;
use App\Contracts\CarrierInterface as Carrier;
use App\Models\Service;

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

        foreach ($routingResponseEntry as $entry) {
            print_r('<pre>');
            print_r('--');
            print_r($entry);
            print_r('</pre>');
        }
        dd($routingResponseEntry);

        $availableServices = $this->availableServices($sd);
dd($availableServices);

//        $temp->short_name = 'Hermes test short name';
//        $temp->est_delivery = 'Hermes test delivery date';
//        $temp->latest_booking = 'Hermes test latest booking';
//        $temp->product_code = 'Hermes test product code';
//        $temp->price = '7357';
//        $temp->carrier = 'Hermes';
//        $data[] = $temp;
        $services = [];
        $srv = new Service;
        $srv->capability = [
            'short_name' => 'Hermes test short name',
            'est_delivery' => 'Hermes test delivery date',
            'latest_booking' => 'Hermes test latest booking',
            'product_code' => 'NDAY',
            'price' => '7357',
            'carrier' => 'Hermes'
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

    /**
     * Filter out the services we don't offer, e.g. Medical Express
     * @param $services
     * @return array
     */
    private function availableServices(array $services) : array
    {
        $availableServices = array_filter($services, function($s) {
            // For each of the services, grab the DB record if it exists, and return based on its existence.
            $service = DB::table('services')->where('product_code', $s->serviceDescription->serviceDescriptionText);
            return !empty($service) ? true : false;
        });
        return $availableServices;
    }
}
