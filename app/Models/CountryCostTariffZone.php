<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryCostTariffZone extends Model
{
    /**
     * Define relationships
     */
    public function tariff()
    {
        return $this->belongsTo(CostTariff::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
