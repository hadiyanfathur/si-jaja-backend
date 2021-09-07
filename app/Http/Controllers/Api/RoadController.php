<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoadDetailResource;
use App\Models\Road;
use App\Repositories\Implementations\CityRepository;
use App\Services\RoadService;
use Illuminate\Http\Request;

class RoadController extends Controller
{

    public function __construct(RoadService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) {
        $data = $this->service->index($request->all());

        return response()->success($data, 'success fetch data!');
    }

    public function show(Road $road)
    {
        return response()->success(new RoadDetailResource($road), 'success fetch data!');
    }
}
