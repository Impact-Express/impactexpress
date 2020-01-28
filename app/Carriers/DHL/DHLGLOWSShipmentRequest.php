<?php

namespace App\Carriers\DHL;

use App\Models\Shipment;

class DHLGLOWSShipmentRequest extends DHLGLOWSRequest
{
	public function __construct()
	{
		$this->service = 'SHIPMENT_REQUEST';
		parent::__construct();
	}

	public function buildRequestBody(Shipment $shipment)
	{
		$accountNumber = $shipment->leastCostRouting();

// dd($shipment);
		// Format the shipment details for the request body
		$shipmentTimestamp = $shipment->date.'T'.'09:00:00GMT+00:00';
		$content = $shipment->documents == "0" ? "NON_DOCUMENTS" : "DOCUMENTS";
		$shipperPersonName = ($shipment->sender_contact_title ? $shipment->sender_contact_title. ' ' : '')
								.$shipment->sender_contact_first_name.' '.$shipment->sender_contact_last_name;
		$shipperStreetLines = ($shipment->sender_house_no ? $shipment->sender_house_no." " : "")
								.($shipment->sender_house_name ? $shipment->sender_house_name." " : "")
								.($shipment->sender_street_name);
		$recipientPersonName = ($shipment->recipient_contact_title ? $shipment->recipient_contact_title. ' ' : '')
								.$shipment->recipient_contact_first_name.' '.$shipment->recipient_contact_last_name;
		$recipientStreetLines = ($shipment->recipient_house_no ? $shipment->recipient_house_no." " : "")
								.($shipment->recipient_house_name ? $shipment->recipient_house_name." " : "")
								.($shipment->recipient_street_name);

// dd($recipientStreetLines);


        $this->ref = $shipment->generateReference();
        $packages = $this->packagesToJson($shipment->pieces);

		$this->requestBody = '{
		   "ShipmentRequest":{  
		      "RequestedShipment":{  
		         "ShipmentInfo":{  
		            "DropOffType":"REGULAR_PICKUP",
		            "ServiceType":"'.$shipment->service->product_code.'",
		            "Account":"'.$accountNumber.'",
		            "Currency":"GBP",
		            "UnitOfMeasurement":"SI"
		         },
		         "ShipTimestamp":"'.$shipmentTimestamp.'",
		         "PaymentInfo":"DAP",
		         "InternationalDetail":{
		            "Commodities":{
		               "NumberOfPieces":"'."1".'",
		               "Description":"'.$shipment->description.'",
		               "CustomsValue":"'.$shipment->declared_value.'"
		            },
		            "Content":"'.$content.'"
		         },
		         "Ship":{
		            "Shipper":{
		               "Contact":{
		                  "PersonName":"'.$shipperPersonName.'",
		                  "CompanyName":"'.$shipment->sender_company_name.'",
		                  "PhoneNumber":"'.$shipment->sender_work_phone.'"
		               },
		               "Address":{  
						  "StreetLines":"'.$shipperStreetLines.'",
						  "StreetName":"'.$shipment->sender_street_name.'",
		                  "City":"'.$shipment->sender_town.'",
		                  "PostalCode":"'.$shipment->sender_postcode.'",
		                  "CountryCode":"'.$shipment->sender_country_code.'"
		               }
		            },
		            "Recipient":{
		               "Contact":{
		                  "PersonName":"'.$recipientPersonName.'",
		                  "CompanyName":"'.$shipment->recipient_company_name.'",
		                  "PhoneNumber":"'.$shipment->recipient_work_phone.'"
		               },
		               "Address":{
		                  "StreetLines":"'.$recipientStreetLines.'",
		                  "City":"'.$shipment->recipient_town.'",
		                  "PostalCode":"'.$shipment->recipient_postcode.'",
		                  "CountryCode":"'.$shipment->recipient_country_code .'"
		               }
		            }
		         },
		         "Packages":{
		            "RequestedPackages":['.$packages.']
		         }
		      }
		   }
		}';
		// dd($this->requestBody);
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
