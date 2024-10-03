<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SampleImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $collection->each(function ($item) {
            $village = Village::where('code', $item[3])->first();

            $neighborhood = $village->neighborhoods()->create([
                'district_id' => $village->district_id,
                'housing' => $item[4],
                'rt' => $item[6],
                'rw' => $item[5],
                'krt' => $item[7],
                'kk' => $item[8],
                'population' => $item[9],
                'is_slum' => strtolower($item[13]) == 'ya',
                'number_of_houses' => $item[16],
            ]);

            $neighborhood->negative_list()->create([
                'name' => $item[10],
                'lat' => $item[11],
                'long' => $item[12],
            ]);

            $neighborhood->house()->create([
                'for_settlement' => $item[14],
                'vacant_house' => $item[15],
                'stores' => $item[17],
                //house location
                'rail' => $item[18],
                'river' => $item[19],
                'sutet' => $item[20],
                'bridge' => $item[21],
                'flood' => $item[22],
                'tidal_flood' => $item[23],
                'landslide' => $item[24],
                'other' => $item[25],
                //by owning
                'owned' => $item[26],
                'not_owned' => $item[27],
                'lease' => $item[28],
            ]);

            $neighborhood->water()->create([
                'bottled_water' => $item[29],
                'refill_water' => $item[30],
                'piped_water_supply' => $item[31],
                'drilled_well' => $item[32],
                'protected_well' => $item[33],
                'unprotected_well' => $item[34],
                'protected_spring' => $item[35],
                'unprotected_spring' => $item[36],
                'nature' => $item[37],
                'rainwater' => $item[38],
                'other' => $item[39],
            ]);

            $neighborhood->sanitation()->create([
                'latrine' => $item[40],
                'septic_tank' => $item[41],
                'ipal' => $item[42],
                'no_toilet' => $item[43],
                'no_septic_tank' => $item[44],
            ]);
        });
    }
}
