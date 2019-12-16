<?php

namespace App\Carriers\DHL;

use Carbon\Carbon;

class DHLGLOWSTracking extends DHLGLOWSRequest
{
	public function __construct()
	{
		$this->service = 'TRACKING_REQUEST';
		parent::__construct();
	}

	public function buildRequestBody($details) 
	{
		$dt = Carbon::now();
        $messageTime = $dt->toDateString().'T'.$dt->toTimeString().'-00:00';
        $messageRef = hash('md5', $dt);
        $awb = $details;
$awb = 3678609546;
		$this->requestBody = '{
			"trackShipmentRequest":{
				"trackingRequest":{
					"TrackingRequest":{
						"Request":{
							"ServiceHeader":{
								"MessageTime":"'.$messageTime.'",
								"MessageReference":"'.$messageRef.'"
							}
						},
						"AWBNumber":{
							"ArrayOfAWBNumberItem":'.$awb.'
						},
						"LevelOfDetails":"ALL_CHECK_POINTS",
						"PiecesEnabled":"S",
						"EstimatedDeliveryDateEnabled":1
					}
				}
			}
		}';
		
	}
}
