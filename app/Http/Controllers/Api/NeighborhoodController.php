<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Village;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    public function districts()
    {
        return response()->json([
            'status' => 'ok',
            'data' => District::select('id', 'name')->get(),
        ]);
    }

    public function villages($district_id)
    {
        return response()->json([
            'status' => 'ok',
            'data' => Village::select('id', 'name')->where('district_id', $district_id)->get(),
        ]);
    }

    public function neighborhoods()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Neighborhood::with('district', 'village', 'house', 'negative_list')
                ->get()
        ]);
    }
}
