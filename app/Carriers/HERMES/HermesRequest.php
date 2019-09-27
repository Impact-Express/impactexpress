<?php

namespace App\Carriers\HERMES;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

abstract class HermesRequest extends Model
{
    protected $service;
    protected $username;
    protected $password;
    public $requestBody;
    public $baseUri = 'https://sit.hermes-europe.co.uk/routing/service/rest/v4/';
    public $endpoints = [
        'VALIDATE_DELIVERY_ADDRESS' => 'validateDeliveryAddress',
        'DETERMINE_DELIVERY_ROUTING' => 'determineDeliveryRouting',
        'ROUTE_DELIVERY_CREATE_PREADVICE' => 'routeDeliveryCreatePreadvice',
        'ROUTE_DELIVERY_CREATE_PREADVICE_AND_LABEL' => 'routeDeliveryCreatePreadviceAndLabel',
        'ROUTE_DELIVERY_CREATE_PREADVICE_RETURN_BARCODE' => 'routeDeliveryCreatePreadviceReturnBarcode',
        'ROUTE_DELIVERY_CREATE_PREADVICE_RETURN_BARCODE_AND_LABEL' => 'routeDeliveryCreatePreadviceReturnBarcodeAndLabel',
    ];

    public function __construct()
    {
        $this->username = config('app.hermes_sandpit_username');
        $this->password = config('app.hermes_sandpit_password');
        parent::__construct();
    }

    abstract public function buildRequestBody($details);

    public function send()
    {
        $client = new Client();
        $response = $client->post($this->baseUri.$this->endpoints[$this->service], [
            'auth' => [
                $this->username,
                $this->password
            ],
            'headers' => [
                'Content-Type' => 'text/xml',
                'Accept' => 'text/xml'
            ],
            'body' => $this->requestBody
        ]);
        $r = new \SimpleXMLElement($response->getBody()->getContents());
//        dd(json_decode(json_encode($r, true)));
        return $r;
    }
}
