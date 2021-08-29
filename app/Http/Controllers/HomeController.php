<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;

class HomeController extends Controller
{
    public function index(DashboardService $service){
        return view('dashboard', $service->index());
    }
}
