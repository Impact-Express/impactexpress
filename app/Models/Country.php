<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\RemoteArea;

class Country extends Model
{
    /**
     * Define relationships
     */
    public function addresses()
    {
    	return $this->hasMany(Address::class);
    }

    public function remoteAreas()
    {
    	return $this->hasMany(RemoteArea::class);
    }

    public function originOf()
    {
        return $this->hasMany(Shipment::class, 'sender_country_id');
    }

    public function destinationOf()
    {
        return $this->hasMany(Shipment::class, 'recipient_country_id');
    }

    public function salesTariffZones()
    {
        return $this->hasMany(CountrySalesTariffZone::class);
    }

    public function costTariffZones()
    {
        return $this->hasMany(CountryCostTariffZone::class);
    }
}
