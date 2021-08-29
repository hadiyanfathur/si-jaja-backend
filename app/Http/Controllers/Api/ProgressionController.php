<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoadExecutionRequest;
use App\Models\Road;
use App\Rules\Base64Image;
use App\Services\ProgressionService;

class ProgressionController extends Controller
{
    public function create(RoadExecutionRequest $request, Road $road, ProgressionService $service)
    {
        $data = $service->store($request->validated(), $road);
;       return response()->success($data, 'Success add Execution data');
    }
}
