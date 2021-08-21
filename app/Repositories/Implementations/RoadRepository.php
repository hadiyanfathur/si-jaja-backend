<?php

namespace App\Repositories\Implementations;

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
}
