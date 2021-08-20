<?php

namespace App\Repositories\Implementations;

use App\Models\Province;

class ProvinceRepository
{
    function findByName(string $name = '', int $limit = 10){
        $city = Province::query();

        $city->where('name', 'like', '%'.$name.'%');
        $city->limit($limit);

        return $city->get();
    }
}
