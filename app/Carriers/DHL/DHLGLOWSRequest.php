<?php

namespace App\Carriers\DHL;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

abstract class DHLGLOWSRequest extends Model
{
    protected $service;
    protected $password;
    protected $username;
    public $requestBody;
	public $baseUri = 'https://wsbexpress.dhl.com/rest/sndpt/';
	public $endpoints = [
		'RATE_REQUEST' => 'RateRequest',
		'SHIPMENT_REQUEST' => 'ShipmentRequest',
		'DELETE_SHIPMENT' => 'DeleteShipment',
		'TRACKING_REQUEST' => 'TrackingRequest',
		'DOCUMENT_RETRIEVE' => 'getPOD',
		'UPDATE_SHIPMENT' => 'UpdateShipmentRequest',
		'REQUEST_PICKUP' => 'PickupRequest'
	];

	public function __construct()
	{
		$this->username = config('app.dhl_glows_sandpit_username');
		$this->password = config('app.dhl_glows_sandpit_password');
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
				'Content-Type' => 'application/json',
				'Accept' => 'application/json'
			],
			'body' => $this->requestBody
		]);
		return json_decode($response->getBody()->getContents());
	}
}
