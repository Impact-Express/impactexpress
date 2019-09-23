<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public static function getActiveCarriers() {
        return self::where(['status' => 'active'])->get();//->toArray();
    }

    public function api() {
        $class = "App\Carriers\\$this->name\\$this->name";
        return new $class($this->id);
    }




    /**
     * Define relationships
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function salesTariffs()
    {
        return $this->hasMany(SalesTariff::class);
    }

    public function costTariffs()
    {
        return $this->hasMany(CostTariff::class);
    }

    public function accountNumbers()
    {
        return $this->hasMany(AccountNumber::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function remoteAreas()
    {
        return $this->hasMany(RemoteArea::class);
    }
}
