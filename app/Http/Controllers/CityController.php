<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function __invoke()
    {
        $response = Http::get(url('api/cities'));
        return view('cities.index', [
            'city' => $response->object()->data
        ]);
    }
}
