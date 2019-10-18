<?php

namespace App\Carriers\HERMES;

use Carbon\Carbon;

class HermesDetermineDeliveryRouting extends HermesRequest
{
    public function __construct() {
        $this->service = 'ROUTE_DELIVERY_CREATE_PREADVICE_AND_LABEL';
        parent::__construct();
    }

    public function buildRequestBody($details)
    {
        // TODO: Implement buildRequestBody() method.
        $this->requestBody = '
            <deliveryRoutingRequest>
                <clientId>780</clientId>
                <clientName>Impact Express</clientName>
                <batchNumber>1</batchNumber>
                <creationDate>2013-11-29T14:35:00</creationDate>
                <userId>hagdc33</userId>
                <sourceOfRequest>CLIENTWS</sourceOfRequest>
                <deliveryRoutingRequestEntries>
                    <deliveryRoutingRequestEntry>
                        <addressValidationRequired>?</addressValidationRequired>
                        <customer>
                            <address>
                                <title>Mr</title>
                                <firstName>Test</firstName>
                                <lastName>Customer</lastName>
                                <houseNo>1</houseNo>
                                <streetName>Capitol Close</streetName>
                                <countryCode>GB</countryCode>
                                <postCode>LS27 0WH</postCode>
                                <city>Leeds</city>
                                <addressLine1>Morley</addressLine1>
                                <region>West Yorkshire</region>
                            </address>
                            <homePhoneNo>123</homePhoneNo>
                            <workPhoneNo>456</workPhoneNo>
                            <mobilePhoneNo>789</mobilePhoneNo>
                            <faxNo>012</faxNo>
                            <email>si@si.com</email>
                            <customerReference1>Ref1</customerReference1>
                            <customerReference2>Ref2</customerReference2>
                            <customerAlertType>2</customerAlertType>
                            <customerAlertGroup>0001</customerAlertGroup>
                            <deliveryMessage>Del Message</deliveryMessage>
                            <specialInstruction1>Spec Inst 1</specialInstruction1>
                            <specialInstruction2>Spec Inst 2</specialInstruction2>
                        </customer>
                        <parcel>
                            <weight>1098</weight>
                            <length>10</length>
                            <width>10</width>
                            <depth>10</depth>
                            <girth>10</girth>
                            <combinedDimension>10</combinedDimension>
                            <volume>1000</volume>
                            <currency>GBP</currency>
                            <value>198</value>
                            <numberOfParts>1</numberOfParts>
                            <numberOfItems>1</numberOfItems>
                            <description>Parcel Desc</description>
                            <originOfParcel>GB</originOfParcel>
                        </parcel>
                        <services>
                            <nextDay>true</nextDay>
                        </services>
                        <senderAddress>
                            <addressLine1>Hermes UK</addressLine1>
                            <addressLine2>Capitol Close</addressLine2>
                            <addressLine3>Leeds</addressLine3>
                            <addressLine4>LS27 0WH</addressLine4>
                        </senderAddress>
                        <expectedDespatchDate>2013-11-29T00:00:00</expectedDespatchDate>
                        <countryOfOrigin>GB</countryOfOrigin>
                    </deliveryRoutingRequestEntry>

                    
                    <deliveryRoutingRequestEntry>
                        <addressValidationRequired>?</addressValidationRequired>
                        <customer>
                            <address>
                                <title>Mr</title>
                                <firstName>Blobby</firstName>
                                <lastName>Customer</lastName>
                                <houseNo>1</houseNo>
                                <streetName>Capitol Close</streetName>
                                <countryCode>GB</countryCode>
                                <postCode>LS27 0WH</postCode>
                                <city>Leeds</city>
                                <addressLine1>Morley</addressLine1>
                                <region>West Yorkshire</region>
                            </address>
                            <homePhoneNo>123</homePhoneNo>
                            <workPhoneNo>456</workPhoneNo>
                            <mobilePhoneNo>789</mobilePhoneNo>
                            <faxNo>012</faxNo>
                            <email>si@si.com</email>
                            <customerReference1>Ref1</customerReference1>
                            <customerReference2>Ref2</customerReference2>
                            <customerAlertType>2</customerAlertType>
                            <customerAlertGroup>0001</customerAlertGroup>
                            <deliveryMessage>Del Message</deliveryMessage>
                            <specialInstruction1>Spec Inst 1</specialInstruction1>
                            <specialInstruction2>Spec Inst 2</specialInstruction2>
                        </customer>
                        <parcel>
                            <weight>1098</weight>
                            <length>10</length>
                            <width>10</width>
                            <depth>10</depth>
                            <girth>10</girth>
                            <combinedDimension>10</combinedDimension>
                            <volume>1000</volume>
                            <currency>GBP</currency>
                            <value>198</value>
                            <numberOfParts>1</numberOfParts>
                            <numberOfItems>1</numberOfItems>
                            <description>Parcel Desc</description>
                            <originOfParcel>GB</originOfParcel>
                        </parcel>
                        <senderAddress>
                            <addressLine1>Hermes UK</addressLine1>
                            <addressLine2>Capitol Close</addressLine2>
                            <addressLine3>Leeds</addressLine3>
                            <addressLine4>LS27 0WH</addressLine4>
                        </senderAddress>
                        <expectedDespatchDate>2013-11-29T00:00:00</expectedDespatchDate>
                        <countryOfOrigin>GB</countryOfOrigin>
                    </deliveryRoutingRequestEntry>
                </deliveryRoutingRequestEntries>
            </deliveryRoutingRequest>
        ';
    }

    private function packagesToXML($packages) {

    }
}
