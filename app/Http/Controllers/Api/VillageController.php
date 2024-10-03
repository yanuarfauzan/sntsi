<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Models\Neighborhood;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VillageController extends Controller
{
    public function index()
    {
        $villages = Village::with('district:id,code,name')
            ->select('id', 'district_id', 'code', 'name')
            ->withCount([
                'neighborhoods as rw' => fn ($q) => $q->select(DB::raw('count(distinct(rw))')),
                'neighborhoods as rt'
            ])
            ->withSum('neighborhoods as krt', 'krt')
            ->withSum('neighborhoods as kk', 'kk')
            ->withSum('neighborhoods as population', 'population')
            ->withSum('neighborhoods as number_of_houses', 'number_of_houses')
            ->addSelect([
                'is_slum' => Neighborhood::select('is_slum')
                    ->where('is_slum', true)
                    ->whereColumn('village_id', 'villages.id')
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
            ->orderBy('code')
            ->get();

        return response()->json([
            'status' => 'ok',
            'data' => VillageResource::collection($villages),
        ], 200);
    }
}
