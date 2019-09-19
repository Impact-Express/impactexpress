<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemoteArea extends Model
{
    /**
     * Define relationships
     */
    public function country() {
    	return $this->belongsTo(Country::class);
    }

    public function carrier() {
        return $this->belongsTo(Carrier::class);
    }
}
