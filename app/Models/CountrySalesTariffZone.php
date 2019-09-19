<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountrySalesTariffZone extends Model
{
    /**
     * Define relationships
     */
    public function tariff()
    {
        return $this->belongsTo(SalesTariff::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
