<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerSalesTariff extends Model
{
    public static function getCustomerTariffs(int $customerId)
    {
        // get customer sales tariffs where customer id == $customerId
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salesTariff()
    {
        return $this->belongsTo(SalesTariff::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
