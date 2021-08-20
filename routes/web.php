<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('dashboard');
    });

    Route::resource('road', \App\Http\Controllers\RoadController::class)->only(['index', 'edit']);
    Route::resource('road', \App\Http\Controllers\RoadController::class)->only(['create', 'update', 'store'])->middleware(['can:planner']);

    Route::get('/district/autocomplete', [\App\Http\Controllers\DistrictController::class, 'autocomplete']);
    Route::get('/village/autocomplete', [\App\Http\Controllers\VillageController::class, 'autocomplete']);
    Route::get('/city/autocomplete', [\App\Http\Controllers\CityController::class, 'autocomplete']);
    Route::get('/province/autocomplete', [\App\Http\Controllers\ProvinceController::class, 'autocomplete']);
});

require __DIR__.'/auth.php';
