<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shipment;
use App\Models\Surcharge;

class Piece extends Model
{

    public static function createPiece($shipment_id, $params, $pieceNumber)
    {
        $piece = new self;
        $piece->shipment_id = $shipment_id;
        $piece->piece_number = $pieceNumber;
        $piece->height = $params->height;
        $piece->width = $params->width;
        $piece->length = $params->length;
        $piece->dead_weight = $params->weight;
        $piece->volumetric_weight = self::calculateVolumetricWeight((array)$params);
        $piece->save();
    }

    public static function calculateVolumetricWeight(array $dims) : float
    {
        return ($dims['length']*$dims['width']*$dims['height'])/5000;
    }

    /**
     * Define relationships
     */
    public function shipment()
    {
    	return $this->belongsTo(Shipment::class);
    }
}
