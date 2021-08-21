<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Autocomplete Routes
|--------------------------------------------------------------------------
|
| Here is where you can register autocompletes routes for your application.
| Autocomplete is inside the middleware auth.
*/

Route::get('/district/autocomplete', [\App\Http\Controllers\DistrictController::class, 'autocomplete']);
Route::get('/village/autocomplete', [\App\Http\Controllers\VillageController::class, 'autocomplete']);
Route::get('/city/autocomplete', [\App\Http\Controllers\CityController::class, 'autocomplete']);
Route::get('/province/autocomplete', [\App\Http\Controllers\ProvinceController::class, 'autocomplete']);
