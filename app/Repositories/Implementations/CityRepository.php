<?php

namespace App\Repositories\Implementations;

use App\Models\City;
use App\Repositories\Contracts\IndonesiaRepositoryInterface;

class CityRepository implements IndonesiaRepositoryInterface
{

    public function findByNameAndReference(string $name = null, array $reference = [], int $limit = 10)
    {
        $city = City::query();
        $city->where('name', 'like', '%'.$name.'%');

        if(isset($reference['province']))
            $city->where('province_id', $reference['province']);

        $city->limit($limit);

        return $city->get();
    }
}
