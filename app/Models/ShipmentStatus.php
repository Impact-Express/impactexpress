<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shipment;

class ShipmentStatus extends Model
{
    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'status_id');
    }
}
