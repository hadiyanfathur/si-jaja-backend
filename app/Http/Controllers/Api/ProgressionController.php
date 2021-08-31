<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoadExecutionRequest;
use App\Models\Road;
use App\Services\ProgressionService;

class ProgressionController extends Controller
{
    public function __construct(ProgressionService $service)
    {
        $this->service = $service;
    }

    public function create(RoadExecutionRequest $request, Road $road)
    {
        $this->service->store($request->validated(), $road);
;       return response()->success(null, 'Success add Execution data');
    }

    public function done(Road $road)
    {
        $this->service->done($road);
        return response()->success(null, 'Success update Execution data');
    }
}
