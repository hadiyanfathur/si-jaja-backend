<?php

namespace App\Http\Controllers;

use App\Exports\RoadsExport;
use App\Http\Requests\RoadPlanningRequest;
use App\Models\Road;
use App\Services\ProgressionService;
use App\Services\RoadService;

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
        return redirect('/roads')->with('success', 'Data Jalan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function show(Road $road)
    {
        return view('road.show', ['road' => $road]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function edit(Road $road)
    {
        return view('road.edit', ['road' => $road]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoadPlanningRequest  $request
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function update(RoadPlanningRequest $request, Road $road)
    {
        $this->service->update($request->validated(), $road);
        return redirect('/roads')->with('success', 'Data Jalan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function destroy(Road $road)
    {
        $road->progressions()->delete();
        $road->delete();
        return redirect('/roads')->with('success', 'Data Jalan Berhasil di Hapus');
    }

    public function datatable()
    {
        return $this->service->datatable();
    }

    public function done(Road $road, ProgressionService $progressionService)
    {
        $progressionService->done($road);
        return redirect('/roads')->with('success', 'Jalan telah Diselesaikan');
    }

    public function export(RoadsExport $export)
    {
        return $export;
    }
}
