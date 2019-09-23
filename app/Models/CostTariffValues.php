<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostTariffValues extends Model
{
    /**
     * Define relationships
     */
    public function tariff()
    {
        return $this->belongsTo(CostTariff::class);
    }
}
