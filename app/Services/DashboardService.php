<?php

namespace App\Services;

use App\Constant\ProgressionStatus;
use App\Repositories\Contracts\RoadRepositoryInterface;

class DashboardService
{
    public function __construct(RoadRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return [
            'budget' => $this->repository->planningBudget(),
            'cost' => $this->repository->contractCost(),
            'planning' => $this->repository->findByStatus(ProgressionStatus::PLANNING)->count(),
            'ongoing' => $this->repository->findByStatus(ProgressionStatus::ONGOING)->count(),
        ];
    }
}
