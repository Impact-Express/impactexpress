<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    public static function createServiceFromAPIResponse($s) {
        $service = self::where(['product_code' => $s->{'@type'}])
            ->with('defaultSalesTariff')
            ->first();
        $service->apiData = $s;
        return $service;
    }

    public static function getServicesByCarrier() {
        $servicesByCarrier = array();
        foreach (self::all() as $service) {
            $servicesByCarrier[$service->carrier->name][] = $service;
        }
        return $servicesByCarrier;
    }

    // Check whether or not the customer has been set to a sales tariff other than the default for this service
    // Then return the applicable tariff
    public function getCustomerSalesTariff(int $customerId) {
        $tariffInfo = DB::select("SELECT
                                            st1.id AS defaultTariffId,
                                            st1.name AS defaultTarioffName,
                                            st2.id AS customerTariffId,
                                            st2.name AS customerTariffName,
                                            IF (st2.name IS NULL, st1.id, st2.id) AS applicableTariffId
                                        FROM
                                            services s
                                        LEFT JOIN customer_sales_tariffs cst ON cst.service_id = s.id
                                        LEFT JOIN sales_tariffs st1 ON st1.id = s.default_sales_tariff_id
                                        LEFT JOIN sales_tariffs st2 ON st2.id = cst.sales_tariff_id
                                        WHERE
                                            IF (st2. NAME IS NOT NULL, cst.`user_id` = {$customerId}, 1=1)
                                        AND
                                            s.id = {$this->id}");
        $tariff = SalesTariff::findOrFail($tariffInfo[0]->applicableTariffId);
        $this->applicableSalesTariff = $tariff;
    }

    /**
     * Define relationships
     */
    public function carrier()
    {
    	return $this->belongsTo(Carrier::class);
    }

    public function shipments()
    {
    	return $this->hasMany(Shipment::class);
    }

    public function defaultSalesTariff()
    {
        return $this->belongsTo(SalesTariff::class, 'default_sales_tariff_id');
    }

    //    private $carriers = [];
//
//    /**
//     * This method calls Carrier::requestAvailableServices() on each of the active carriers
//     * @param $request
//     * @return array
//     */
//    public function requestAvailableServices($request) : array
//    {
//        $this->loadActiveCarriersWithAPI();
//dd($this->carriers);
//        $capability = [];
//        foreach ($this->carriers as $name => $carrier) {
//            $capability[$carrier->name] = $carrier->api->requestAvailableServices($request);
//        }
//        $capability = $this->aggregateResults($capability);
//
//dd($capability);
//        return $capability;
//    }
//
//    private function aggregateResults(array $capability) : array
//    {
//        $a = [];
//        foreach ($capability as $services)
//        {
//            $a = array_merge($a, $services->data());
//        }
//        return $a;
//    }
//
//    /**
//     * Load the active carriers
//     * TODO: this should be in the carrier class as a factory method
//     */
//    private function loadActiveCarriersWithAPI()
//    {
//        $carriers =  Carrier::getActiveCarriers();
//
////        foreach ($carriers as $carrier) {
////            $class = "App\Carriers\\$carrier->name\\$carrier->name";
////            $this->carriers[] = new $class($carrier->id);
////        }
//        // TODO: this could, and probably should, be done in the Carrier class constructor
//        foreach ($carriers as $carrier) {
//            $apiClass = "App\Carriers\\$carrier->name\\$carrier->name";
//            $carrier->api = new $apiClass($carrier->id);
//            $this->carriers[] = $carrier;
//        }
//    }


    /**
     * return [
     *      "carrier01" => [
     *          0   =>  "service01",
     *          1   =>  "service02"
     *      ],
     *      "carrier02" =>  [
     *          0   => "service03",
     *          1   =>  "service04"
     *      ]
     * ]
     * @return array
     */
}
