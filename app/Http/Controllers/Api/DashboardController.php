<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function index(DashboardService $service)
    {
        return response()->success($service->index(), 'success fetch data');
    }
}
