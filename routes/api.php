<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->success($request->user(), 'success fetch data user');
});

Route::middleware('auth:api')->group(function() {
    Route::get('roads', [\App\Http\Controllers\Api\RoadController::class, 'index'])->name('api.roads.index');
    Route::get('roads/{road}', [\App\Http\Controllers\Api\RoadController::class, 'show'])->name('api.roads.show');
    Route::post('progressions/{road}', [\App\Http\Controllers\Api\ProgressionController::class, 'create']);
    Route::post('progressions/{road}/done', [\App\Http\Controllers\Api\ProgressionController::class, 'done']);
    Route::post('progressions/{road}/upload', [\App\Http\Controllers\Api\ProgressionController::class, 'upload']);
    Route::get('histories', [\App\Http\Controllers\Api\HistoryController::class, 'index'])->name('api.history.index');
    Route::get('summaries', [\App\Http\Controllers\Api\DashboardController::class, 'index'])->name('api.summary.index');
});


