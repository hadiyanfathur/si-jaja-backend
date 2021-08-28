<?php

use \Illuminate\Support\Facades\Route;

Route::post('oauth/token', [\App\Http\Controllers\Api\CustomAccessTokenController::class, 'issueUserToken']);
