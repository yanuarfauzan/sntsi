<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\NeighborhoodController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\Route;

Route::get('villages', [VillageController::class, 'index']);
Route::get('districts', [DistrictController::class, 'index']);
Route::get('cities', [CityController::class, 'index']);

Route::get('list-districts', [NeighborhoodController::class, 'districts']);
Route::get('list-villages/{district}', [NeighborhoodController::class, 'villages']);
Route::get('neighborhoods', [NeighborhoodController::class, 'neighborhoods']);
