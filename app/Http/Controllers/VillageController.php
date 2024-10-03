<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('villages.index');
    }
}
