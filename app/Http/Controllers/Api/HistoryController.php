<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RoadService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request, RoadService $service)
    {
        $data = $service->history($request->all());

        return response()->success($data, 'success fecth data!');
    }
}
