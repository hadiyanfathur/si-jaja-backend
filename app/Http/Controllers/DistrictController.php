<?php

namespace App\Http\Controllers;

use App\Repositories\Implementations\DistrictRepository;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function autocomplete(Request $request, DistrictRepository $district) {
        if($request->city == '')
            throw new \Exception('Please Select City First');
        $data['items'] = $district->findByNameAndReference($request->name, ['city' => $request->city], 10);
        return $data['items']->toJson();
    }
}
