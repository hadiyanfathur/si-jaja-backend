<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Datatable Routes
|--------------------------------------------------------------------------
|
| Here is where you can register datatable routes for your application.
| Datatable is inside the middleware auth.
*/

Route::get('road/datatable', [\App\Http\Controllers\RoadController::class, 'datatable']);
