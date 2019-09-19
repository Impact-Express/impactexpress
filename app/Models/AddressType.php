<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class AddressType extends Model
{
    /**
     * Define relationships
     */
    public function addresses() {
    	return $this->hasMany(Address::class);
    }
}
