<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoadExecutionRequest;
use App\Models\Road;
use App\Services\ProgressionService;

class ProgressionController extends Controller
{
    private $service;

    public function __construct(ProgressionService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('progression.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Road $road)
    {
        return view('progression.create', ['road' => $road]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoadExecutionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadExecutionRequest $request, Road $road)
    {
        $this->service->store($request->validated(), $road);

        return redirect('/roads')->with('success', 'Road execution data has successfully saved');
    }

    public function datatable()
    {
        return $this->service->datatable();
    }
}
