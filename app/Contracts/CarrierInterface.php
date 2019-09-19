<?php

namespace App\Contracts;

use App\Models\Responses\ServiceRequestResult;
use App\Models\Responses\ShipmentRequestResult;
use App\Models\Responses\TrackingRequestResult;

interface CarrierInterface
{
    public function requestAvailableServices($request, int $customerId) : ServiceRequestResult;
    public function requestShipment($request) : ShipmentRequestResult;
    public function requestTrackingData($request) : TrackingRequestResult;
//    public function calculateSurcharges($request) : ApplicableSurcharges;

    public function name() : string;
}
