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

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

    require __DIR__.'/autocompletes.php';
    require __DIR__.'/datatables.php';

    Route::resource('roads', \App\Http\Controllers\RoadController::class)->only(['create', 'store', 'edit'])->middleware('can:planner');
    Route::resource('roads', \App\Http\Controllers\RoadController::class)->only(['index', 'show']);
    Route::post('roads/{road}/done', [\App\Http\Controllers\RoadController::class, 'done'])->name('progressions.done');
    Route::get('roads/{road}/progressions/create', [\App\Http\Controllers\ProgressionController::class, 'create'])->name('progressions.create');
    Route::post('roads/{road}/progressions/create', [\App\Http\Controllers\ProgressionController::class, 'store'])->name('progressions.store');
    Route::resource('progressions', \App\Http\Controllers\ProgressionController::class)->only(['index', 'show', 'edit']);
});

require __DIR__.'/auth.php';
