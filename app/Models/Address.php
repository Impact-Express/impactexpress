<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AddressType;
use App\Models\Country;
use App\Models\Shipment;
use App\Models\User;
use App\Traits\GeneratesUuid;

class Address extends Model
{
    use GeneratesUuid;

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Define relationships
     */
    public function addressType()
    {
    	return $this->belongsTo(AddressType::class);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
