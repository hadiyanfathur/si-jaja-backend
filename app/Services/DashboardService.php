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
            'budget' => (double) $this->repository->planningBudget(),
            'cost' => (double) $this->repository->contractCost(),
            'planning' => (double) $this->repository->findByStatus(ProgressionStatus::PLANNING)->count(),
            'ongoing' => (double) $this->repository->findByStatus(ProgressionStatus::ONGOING)->count(),
        ];
    }
}
