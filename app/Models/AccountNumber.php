<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountNumber extends Model
{
    /**
     * Define Relationships
     */
    public function carrier()
    {
    	return $this->belongsTo(Carrier::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
