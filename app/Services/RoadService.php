<?php

namespace App\Services;

use App\Constant\ProgressionStatus;
use App\Constant\UserLevel;
use App\Http\Resources\RoadResource;
use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoadService {
    use HasDatatable;

    private $roadRepository;

    public function __construct(RoadRepositoryInterface $roadRepository)
    {
        $this->roadRepository = $roadRepository;
    }

    public function index($request)
    {
        $query = $this->roadRepository->findByStatus($request['status'] ?? null);

        return RoadResource::collection($query->get());
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $road = Road::create($request);
            $road->progressions()->create(array_merge($request, ['status' => ProgressionStatus::PLANNING]));
        });

        return true;
    }

    public function datatable()
    {
        $query = $this->roadRepository->withLatestProgression();

        $edit = Auth::user()->level == UserLevel::ADMINISTRATOR || Auth::user()->level == UserLevel::PLANNER;

        $datatable = $this->generate($query->get(), 'roads', ['show' => true, 'edit' => $edit]);

        return $datatable->make(true);
    }

    public function history($request)
    {
        $query = $this->roadRepository->isDoneWithName($request['name'] ?? null);

        return RoadResource::collection($query->get());
    }

}
