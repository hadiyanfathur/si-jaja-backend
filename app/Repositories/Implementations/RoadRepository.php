<?php

namespace App\Repositories\Implementations;

use App\Constant\ProgressionStatus;
use App\Models\Progression;
use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class RoadRepository implements RoadRepositoryInterface
{
    public function withLatestProgression(): Builder
    {
        $query = Road::query();
        $query->with(['province', 'city', 'district', 'village']);
        $query->with('latestProgression');

        return $query;
    }

    public function findByStatus($status): Builder
    {
        $query = Road::query();
        $query->with(['province', 'city', 'district', 'village']);
        $query->with('latestProgression');
        if(!empty($status)){
            $query->where(function ($query) {
                $query->select('status')
                    ->from('progressions')
                    ->whereColumn('progressions.road_id', 'roads.id')
                    ->orderByDesc('progressions.id')
                    ->limit(1);
            }, $status);
        }

        return $query;
    }

    public function isDoneWithName($name): Builder
    {
        $query = $this->findByStatus(ProgressionStatus::DONE);
        $query->where('name', 'like', '%'.$name.'%');
        return $query;
    }

    public function planningBudget()
    {
        $query = $this->findByStatus(ProgressionStatus::PLANNING);
        return $query->sum('budget');
    }

    public function contractCost()
    {
        $query = $this->findByStatus(ProgressionStatus::ONGOING);
        return $query->sum('cost');
    }
}
