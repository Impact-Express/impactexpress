<?php

namespace App\Carriers\DHL;

use Carbon\Carbon;

class DHLGLOWSRateRequest extends DHLGLOWSRequest
{
	public function __construct()
	{
		$this->service = 'RATE_REQUEST';
		parent::__construct();
	}

	public function buildRequestBody($details)
	{
		$dt = Carbon::now();
        $messageTime = $dt->toDateString().'T'.$dt->toTimeString().'-00:00';
        $messageRef = hash('md5', $dt);

        $shipTimestamp = $details['date'].'T'.'09:00:00GMT+00:00';
        $unitOfMeasurement = 'SI';
        $content = (isset($details['documents']) && $details['documents'] === 'on') ? 'DOCUMENTS' : 'NON_DOCUMENTS';
        $shipperCity = $details['senderTown'];
        $shipperCountryCode = $details['senderCountryCode'];
        $shipperPostalCode = $details['senderPostcode'];
        $recipientCity = $details['recipientTown'];
        $recipientCountryCode = $details['recipientCountryCode'];
        $recipientPostalCode = $details['recipientPostcode'];
        $packages = $this->packagesToJson($details['parcels']);

		$this->requestBody = '{
			"RateRequest": {
				"ClientDetails": null,
				"Request": {
					"ServiceHeader": {
						"MessageTime":"'.$messageTime.'",
						"MessageReference":"'.$messageRef.'"
					}	
				},
				"RequestedShipment": {
					"DropOffType": "REQUEST_COURIER",
					"ShipTimestamp": "'.$shipTimestamp.'",
					"UnitOfMeasurement": "'.$unitOfMeasurement.'",
					"Content": "'.$content.'",
					"PaymentInfo": "DAP",
					"NextBusinessDay": "N",
					"Account": 139165658,
					"Ship": {
						"Shipper": {
							"City": "'.$shipperCity.'",
							"PostalCode": "'.$shipperPostalCode.'",
							"CountryCode": "'.$shipperCountryCode.'"
						},
						"Recipient": {
							"City": "'.$recipientCity.'",
							"PostalCode": "'.$recipientPostalCode.'",
							"CountryCode": "'.$recipientCountryCode.'"
						}
					},
					"Packages": {
						"RequestedPackages":['.$packages.']
					}
				}
			}
		}';

//        dd($this->requestBody);
	}

    /**
     * Take an array of packages and construct a string of comma separated JSON objects.
     * TODO: this time it's donr differently because dhl are stupid
     * @param array $packages
     * @return string
     */
	private function packagesToJson($packages)
    {
		$json = [];
		$n = 1;
		foreach ($packages as $package) {
            $a = '';
            $a .= '{';
            $a .= '"@number":"'.$n.'",';
            $a .= '"Weight": {';
            $a .= '"Value": '.$package['weight'];
            $a .= '},';
            $a .= '"Dimensions": {';
            $a .= '"Length": '.$package['length'].',';
            $a .= '"Width": '.$package['width'].',';
            $a .= '"Height": '.$package['height'];
            $a .= '}';
            $a .= '}';
            $json[] = $a;
            $n++;
		}
		return implode(',', $json);
	}
}