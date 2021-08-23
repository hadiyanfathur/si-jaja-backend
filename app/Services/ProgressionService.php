<?php

namespace App\Services;

use App\Constant\ProgressionStatus;
use App\Models\Progression;
use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\DB;

class ProgressionService
{
    use HasDatatable;

    private $roadRepository;

    public function __construct(RoadRepositoryInterface $roadRepository)
    {
        $this->roadRepository = $roadRepository;
    }

    public function store($request, $road)
    {
        DB::transaction(function () use ($request, $road) {
            $road->update($request);
            $road->progressions()->create(array_merge($request, ['status' => ProgressionStatus::ONGOING]));
        });

        return true;
    }

    public function datatable()
    {
        $query = $this->roadRepository->withLatestProgression();

        $query->where('start_at', '=', null);

        $datatable = $this->generate($query->get(), 'roads', null);
        $datatable->addColumn('execution', function ($model) {
            $map['execution_url'] = route('progressions.create', $model->id);
            return view('progression.execution-button', $map);
        });

        return $datatable->make(true);
    }
}
