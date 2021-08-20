<?php

namespace App\Repositories\Implementations;

use App\Models\Village;
use App\Repositories\Contracts\IndonesiaRepositoryInterface;

class VillageRepository implements IndonesiaRepositoryInterface
{

    public function findByNameAndReference(string $name = null, array $reference = [], int $limit = 10)
    {
        $district = Village::query();
        $district->where('name', 'like', '%'.$name.'%');

        if(isset($reference['district']))
            $district->where('district_id', $reference['district']);

        $district->limit($limit);

        return $district->get();
    }
}
