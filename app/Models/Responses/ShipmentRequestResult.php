<?php

namespace App\Models\Responses;

use Illuminate\Database\Eloquent\Model;

class ShipmentRequestResult extends Model
{
    public $status;
    public $labelImage;
    public $airwaybillNumber;
    public $pieces = [];

    public $errorCode;
    public $errorMessage;
}
