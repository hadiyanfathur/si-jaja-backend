<?php

namespace App\Services;

use App\Models\Road;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\DB;

class RoadService {
    use HasDatatable;

    public function index()
    {
        return null;
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $road = Road::create($request);
            $road->progressions()->create(array_merge($request, ['status' => 'approved']));
        });

        return true;
    }

    public function datatable()
    {
        $query = Road::query();
        $query->with(['province', 'city', 'district', 'village']);

        $datatable = $this->generate($query->get(), 'road', array('edit' => true));

        return $datatable->make(true);
    }

}
