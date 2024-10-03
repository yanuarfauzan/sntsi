<?php

use App\Http\Controllers\ImportController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NeighborhoodController;
use Symfony\Component\Routing\Loader\Configurator\ImportConfigurator;

Route::get('/', function () {
    return redirect('login');
});
Route::post('/login', [LandingPageController::class, 'login'])->name('login');
Route::get('/landing-page', [LandingPageController::class, 'index'])->name('landing-page');
Route::get('/landing-home', [LandingPageController::class, 'home'])->name('landing-home');
Route::get('/sanitasi', [LandingPageController::class, 'sanitasi'])->name('sanitasi');
Route::get('/air-bersih', [LandingPageController::class, 'airBersih'])->name('air-bersih');
Route::get('/lokasi-kawasan/{id?}', [LandingPageController::class, 'lokasiKawasan'])->name('lokasi-kawasan');
Route::get('/import', [LandingPageController::class, 'import'])->name('import');
Route::post('/do-import/{districtId}/{villageId}', [LandingPageController::class, 'doImport'])->name('doImport');
Route::get('/export/{id}/{fundValue}', [LandingPageController::class, 'exportData'])->name('export'); 
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
}); 

Auth::routes(['register' => false, 'reset' => false, 'password.confirm' => false, 'verify' => false]);

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'edit']);
    Route::post('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    Route::get('villages', VillageController::class);
    Route::get('districts', DistrictController::class);
    Route::get('cities', CityController::class);

    Route::get('neighborhoods', [NeighborhoodController::class, 'index']);
    Route::get('neighborhoods/{neighborhood}', [NeighborhoodController::class, 'edit']);
    Route::post('neighborhoods/{neighborhood}', [NeighborhoodController::class, 'update']);
    Route::delete('neighborhoods/{neighborhood}/{neighborhoodImage}', [NeighborhoodController::class, 'destroy']);

    Route::get('import-excel', [ImportController::class, 'importExcel']);
    Route::post('do-import-neighborhood', [ImportController::class, 'doImportNeighborhood']);
    Route::post('do-import-village', [ImportController::class, 'doImportVillage']);
    Route::post('do-import-district', [ImportController::class, 'doImportDistrict']);
    Route::post('do-import-city', [ImportController::class, 'doImportCity']);

    
});