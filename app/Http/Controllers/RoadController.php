<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoadPlanningRequest;
use App\Models\Road;
use Illuminate\Http\Request;
use App\Services\RoadService;
use Yajra\DataTables\Contracts\DataTable;

class RoadController extends Controller
{
    public function __construct(RoadService $service)
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
        return view('road.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('road.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoadPlanningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadPlanningRequest $request)
    {
        $this->service->store($request->validated());
        return redirect('/roads')->with('success', 'Road has successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function show(Road $road)
    {
        return view('road.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function edit(Road $road)
    {
        return view('road.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Road $road)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function destroy(Road $road)
    {
        //
    }

    public function datatable()
    {
        return $this->service->datatable();
    }
}
