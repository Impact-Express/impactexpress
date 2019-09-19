<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesTariffValues extends Model
{
    /**
     * Define relationships
     */
    public function tariff()
    {
        return $this->belongsTo(SalesTariff::class);
    }
}
