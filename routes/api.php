<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\NeighborhoodController;

Route::get('villages', [VillageController::class, 'index']);
Route::get('districts', [DistrictController::class, 'index']);
Route::get('cities', [CityController::class, 'index']);

Route::get('list-districts', [NeighborhoodController::class, 'districts']);
Route::get('list-villages/{district}', [NeighborhoodController::class, 'villages']);
Route::get('neighborhoods', [NeighborhoodController::class, 'neighborhoods']);

Route::get('getFunding/{neighborhoodId}/{fundType}', [LandingPageController::class, 'getFunding']);
