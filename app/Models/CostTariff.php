<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;

class CostTariff extends Model
{
    protected $fillable = ['name', 'import_export', 'carrier_id'];

    public static function createTariff($request)
    {
        $reader = Reader::createFromString(File::get($request->file('file')));
        $records = $reader->getRecords();
        $tariff = CostTariff::create([
            'name' => $request->name,
            'import_export' => $request->import === "on" ? "import" : "export",
            'carrier_id' => $request->carrier
        ]);
        $data = [];
        foreach ($records as $record) {

            if ($record[0] === "kg" || $record[0] === "Kg") continue;
            foreach ($record as $zone => $value) {
                if ($zone === 0) continue;
                $data[] = [
                    'cost_tariff_id' => $tariff->id,
                    'weight' => $record[0],
                    'zone' => $zone,
                    'documents' => $request->documents === "on" ? '1' : '0',
                    'amount' => round($record[$zone], 5),
                    'created_at' => now()->isoFormat('YYYY-M-D HH:mm:ss'),
                    'updated_at' => now()->isoFormat('YYYY-M-D HH:mm:ss')
                ];
            }
        }
        CostTariffValues::insert($data);
    }

    /**
     * Define relationships
     */
    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function countryZones()
    {
        return $this->hasMany(CountryCostTariffZone::class);
    }

    public function values()
    {
        return $this->hasMany(CostTariffValues::class);
    }
}
