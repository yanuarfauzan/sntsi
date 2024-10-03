<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\District;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $districts = District::select('id', 'code', 'name')
            ->withCount([
                'villages as number_of_villages',
                'neighborhoods as rw' => fn ($q) => $q->select(DB::raw('count(distinct(concat(name,rw)))')),
                'neighborhoods as rt'
            ])
            ->withSum('neighborhoods as krt', 'krt')
            ->withSum('neighborhoods as kk', 'kk')
            ->withSum('neighborhoods as population', 'population')
            ->withSum('neighborhoods as number_of_houses', 'number_of_houses')
            ->addSelect([
                'is_slum' => Neighborhood::select('is_slum')
                    ->where('is_slum', true)
                    ->whereColumn('district_id', 'districts.id')
                    ->latest()
                    ->take(1)
            ])
            ->withSum('houses as rail', 'rail')
            ->withSum('houses as river', 'river')
            ->withSum('houses as sutet', 'sutet')
            ->withSum('houses as bridge', 'bridge')
            ->withSum('houses as flood', 'flood')
            ->withSum('houses as tidal_flood', 'tidal_flood')
            ->withSum('houses as landslide', 'landslide')
            ->withSum('houses as other', 'other')
            ->withSum('houses as vacant_house', 'vacant_house')
            ->withSum('houses as for_settlement', 'for_settlement')
            ->withSum('houses as owned', 'owned')
            ->withSum('houses as not_owned', 'not_owned')
            ->withSum('houses as lease', 'lease')

            ->withSum('waters as bottled_water', 'bottled_water')
            ->withSum('waters as refill_water', 'refill_water')
            ->withSum('waters as piped_water_supply', 'piped_water_supply')
            ->withSum('waters as drilled_well', 'drilled_well')
            ->withSum('waters as protected_well', 'protected_well')
            ->withSum('waters as unprotected_well', 'unprotected_well')
            ->withSum('waters as protected_spring', 'protected_spring')
            ->withSum('waters as unprotected_spring', 'unprotected_spring')
            ->withSum('waters as nature', 'nature')
            ->withSum('waters as rainwater', 'rainwater')
            ->withSum('waters as water_other', 'other')

            ->withSum('sanitations as latrine', 'latrine')
            ->withSum('sanitations as septic_tank', 'septic_tank')
            ->withSum('sanitations as ipal', 'ipal')
            ->withSum('sanitations as no_toilet', 'no_toilet')
            ->withSum('sanitations as no_septic_tank', 'no_septic_tank')

            ->withSum('houses as stores', 'stores')
            ->get()
            ->pipe(function ($item) {
                return collect([
                    'number_of_districts' => $item->count('id'),
                    'number_of_villages' => $item->sum('number_of_villages'),
                    'rw' => $item->sum('rw'),
                    'rt' => $item->sum('rt'),
                    'number_of_houses' => $item->sum('number_of_houses'),
                    'houses' => [
                        'negative_list' => [
                            'rail' => $item->sum('rail'),
                            'river' => $item->sum('river'),
                            'sutet' => $item->sum('sutet'),
                            'bridge' => $item->sum('bridge'),
                        ],
                        'disaster_prone' => [
                            'flood' => $item->sum('flood'),
                            'tidal_flood' => $item->sum('tidal_flood'),
                            'landslide' => $item->sum('landslide'),
                            'other' => $item->sum('other'),
                        ]
                    ],
                    'vacant_house' => $item->sum('vacant_house'),
                    'for_settlement' => $item->sum('for_settlement'),
                    'ownership' => [
                        'owned' => $item->sum('owned'),
                        'not_owned' => $item->sum('not_owned'),
                        'lease' => $item->sum('lease'),
                        'stores' => $item->sum('stores'),
                    ],
                    'water' => [
                        'bottled_water' => $item->sum('bottled_water'),
                        'refill_water' => $item->sum('refill_water'),
                        'piped_water_supply' => $item->sum('piped_water_supply'),
                        'drilled_well' => $item->sum('drilled_well'),
                        'protected_well' => $item->sum('protected_well'),
                        'unprotected_well' => $item->sum('unprotected_well'),
                        'protected_spring' => $item->sum('protected_spring'),
                        'unprotected_spring' => $item->sum('unprotected_spring'),
                        'nature' => $item->sum('nature'),
                        'rainwater' => $item->sum('rainwater'),
                        'other' => $item->sum('water_other'),
                    ],
                    'sanitation' => [
                        'latrine' => $item->sum('latrine'),
                        'septic_tank' => $item->sum('septic_tank'),
                        'ipal' => $item->sum('ipal'),
                    ],
                    'unserved_sanitation' => [
                        'no_toilet' => $item->sum('no_toilet'),
                        'no_septic_tank' => $item->sum('no_septic_tank'),
                    ],
                ]);
            });

        return response()->json([
            'status' => 'ok',
            'data' => $districts,
        ], 200);
    }
}
