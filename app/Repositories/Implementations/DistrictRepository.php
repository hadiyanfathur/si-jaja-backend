<?php

namespace App\Repositories\Implementations;

use App\Models\District;
use App\Repositories\Contracts\IndonesiaRepositoryInterface;

class DistrictRepository implements IndonesiaRepositoryInterface
{

    public function findByNameAndReference(string $name = null, array $reference = [], int $limit = 10)
    {
        $district = District::query();
        $district->where('name', 'like', '%'.$name.'%');

        if(isset($reference['city']))
            $district->where('city_id', $reference['city']);

        $district->limit($limit);

        return $district->get();
    }
}
