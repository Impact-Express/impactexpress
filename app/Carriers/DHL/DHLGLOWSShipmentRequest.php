<?php

namespace App\Carriers\DHL;


class DHLGLOWSShipmentRequest extends DHLGLOWSRequest
{
	public function __construct()
	{
		$this->service = 'SHIPMENT_REQUEST';
		parent::__construct();
	}

	public function buildRequestBody($details)
	{
	    $shipmentTimestamp = $details['shipTime'].'T'.'09:00:00GMT+00:00';
        $this->ref = $details['shipmentRef'];
        $packages = $this->packagesToJson($details['parcels']);

		$this->requestBody = '{
		   "ShipmentRequest":{  
		      "RequestedShipment":{  
		         "ShipmentInfo":{  
		            "DropOffType":"'.$details['dropOffType'].'",
		            "ServiceType":"'.$details['serviceCode'].'",
		            "Account":"'.$details['accountNumber'].'",
		            "Currency":"GBP",
		            "UnitOfMeasurement":"SI"
		         },
		         "ShipTimestamp":"'.$shipmentTimestamp.'",
		         "PaymentInfo":"DAP",
		         "InternationalDetail":{  
		            "Commodities":{  
		               "NumberOfPieces":"'.$details['numberOfPieces'].'",
		               "Description":"'.$details['description'].'",
		               "CustomsValue":"'.$details['customsValue'].'"
		            },
		            "Content":"'.$details['content'].'"
		         },
		         "Ship":{  
		            "Shipper":{  
		               "Contact":{  
		                  "PersonName":"'.$details['senderPersonName'].'",
		                  "CompanyName":"'.$details['senderCompanyName'].'",
		                  "PhoneNumber":"'.$details['senderPhone'].'"
		               },
		               "Address":{  
		                  "StreetLines":"'.$details['senderAddressLine1'].'",
		                  "City":"'.$details['senderCity'].'",
		                  "PostalCode":"'.$details['senderPostcode'].'",
		                  "CountryCode":"'.$details['senderCountryCode'].'"
		               }
		            },
		            "Recipient":{  
		               "Contact":{  
		                  "PersonName":"'.$details['recipientPersonName'].'",
		                  "CompanyName":"'.$details['recipientCompanyName'].'",
		                  "PhoneNumber":"'.$details['recipientPhone'].'"
		               },
		               "Address":{  
		                  "StreetLines":"'.$details['recipientAddressLine1'].'",
		                  "City":"'.$details['recipientCity'].'",
		     
		                  "PostalCode":"'.$details['recipientPostcode'].'",
		                  "CountryCode":"'.$details['recipientCountryCode'].'"
		               }
		            }
		         },
		         "Packages":{
		            "RequestedPackages":['.$packages.']
		         }
		      }
		   }
		}';
		dd($this->requestBody);
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

            $weight = $package['dead_weight'] > $package['volumetric_weight'] ? $package['dead_weight'] : $package['volumetric_weight'];

            $a = '';
            $a .= '{';
            $a .= '"@number":"'.$n.'",';
            $a .= '"Weight": '.$weight.',';
            $a .= '"Dimensions": {';
            $a .= '"Length": '.$package['length'].',';
            $a .= '"Width": '.$package['width'].',';
            $a .= '"Height": '.$package['height'];
            $a .= '},';
            $a .= '"CustomerReferences": "'.$this->ref.'"';
            $a .= '}';
            $json[] = $a;
            $n++;
        }
        return implode(',', $json);
    }
}
