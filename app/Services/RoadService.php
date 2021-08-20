<?php

namespace App\Services;

class RoadService {

    public function index()
    {
        $provinces = \Indonesia::allProvinces();
        $cities = \Indonesia::allCities();

        return [
            'provinces' => $provinces,
            'cities' => $cities,
        ];
    }

    public function create()
    {
        $provinces = \Indonesia::allProvinces();
        $cities = \Indonesia::allCities();

        return [
            'provinces' => $provinces,
            'cities' => $cities,
        ];
    }
}
