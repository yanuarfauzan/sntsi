<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
            'number_of_villages' => $this->number_of_villages,
            'rw' => $this->rw,
            'rt' => $this->rt,
            'krt' => $this->krt,
            'kk' => $this->kk,
            'population' => $this->population,
            'number_of_houses' => $this->number_of_houses,
            'is_slum' => $this->is_slum ? true : false,
            'houses' => [
                'location' => [
                    'rail' => $this->rail,
                    'river' => $this->river,
                    'sutet' => $this->sutet,
                    'bridge' => $this->bridge,
                    'disaster_prone' => [
                        'flood' => $this->flood,
                        'tidal_flood' => $this->tidal_flood,
                        'landslide' => $this->landslide,
                        'other' => $this->other
                    ]
                ],
                'vacant_house' => $this->vacant_house,
                'for_settlement' => $this->for_settlement,
                'ownership' => [
                    'owned' => $this->owned,
                    'not_owned' => $this->not_owned,
                    'lease' => $this->lease
                ]
            ],
            'water' => [
                'bottled_water' => $this->bottled_water,
                'refill_water' => $this->refill_water,
                'piped_water_supply' => $this->piped_water_supply,
                'drilled_well' => $this->drilled_well,
                'protected_well' => $this->protected_well,
                'unprotected_well' => $this->unprotected_well,
                'protected_spring' => $this->protected_spring,
                'unprotected_spring' => $this->unprotected_spring,
                'nature' => $this->nature,
                'rainwater' => $this->rainwater,
                'other' => $this->water_other
            ],
            'sanitation' => [
                'sanitation_coverage' => [
                    'latrine' => $this->latrine,
                    'septic_tank' => $this->septic_tank,
                    'ipal' => $this->ipal
                ],
                'unserved_sanitation' => [
                    'no_toilet' => $this->no_toilet,
                    'no_septic_tank' => $this->no_septic_tank
                ]
            ],
            'stores' => $this->stores,
        ];
    }
}
