<?php

namespace App\Models\Responses;

use Illuminate\Database\Eloquent\Model;

class ServiceRequestResult extends Model
{
    private $data = [];

    public function __construct($data)
    {
        parent::__construct();
        $this->data = $data;
    }

    public function data() : array
    {
        return $this->data;
    }
}
