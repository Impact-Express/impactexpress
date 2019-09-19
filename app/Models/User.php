<?php

namespace App\Models;

use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSalesTariffs() {
//        $overriddenSalesTariffs = $this->customerSalesTariffs()->with('service', 'service.carrier', 'salesTariff')->get();
//        $defaultSalesTariffs = Carrier::with('services', 'services.defaultSalesTariff')->get();

        $salesTariffs = DB::select("SELECT
                                              c.name as carrierName,
                                              s.name as serviceName,
                                              CONCAT(st.name, ' (special)') AS salesTariffName,
                                              st.id as salesTariffId
                                            FROM
                                              customer_sales_tariffs cst
                                              LEFT JOIN sales_tariffs st ON st.id = cst.sales_tariff_id
                                              LEFT JOIN services s ON s.id = cst.service_id
                                              LEFT JOIN carriers c ON c.id = s.carrier_id
                                            WHERE
                                              cst.user_id = {$this->id}
                                              UNION ALL 
                                            SELECT
                                              c.name as carrierName,
                                              s.name as serviceName,
                                              st.name as salesTariffName,
                                              st.id as salesTariffId
                                            FROM 
                                              carriers c
                                              LEFT JOIN services s ON s.carrier_id = c.id
                                              LEFT JOIN sales_tariffs st ON s.default_sales_tariff_id = st.id
                                              WHERE s.id NOT IN (
                                                SELECT
                                                  service_id
                                                    FROM
                                                  customer_sales_tariffs
                                                    WHERE
                                                  customer_sales_tariffs.user_id = {$this->id}
                                              )
                                              ORDER BY carrierName");

        $tariffsByCarrier = [];
        foreach ($salesTariffs as $st) {
            $tariffsByCarrier[$st->carrierName][$st->serviceName][0] = $st->salesTariffName;
            $tariffsByCarrier[$st->carrierName][$st->serviceName][1] = $st->salesTariffId;
        }

//        dd($tariffsByCarrier);
        return $tariffsByCarrier;
    }

    public function isAdmin() {
        return $this->group->name == 'admin';
    }
    
    /**
     * Define relationships
     */
    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function shipments() {
        return $this->hasMany(Shipment::class);
    }

    public function customerSalesTariffs() {
        return $this->hasMany(CustomerSalesTariff::class);
    }
}
