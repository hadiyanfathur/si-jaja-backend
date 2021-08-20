<?php

namespace App\Http\Controllers;

use App\Repositories\Implementations\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function autocomplete(Request $request, CityRepository $city) {
        if($request->province == '')
            throw new \Exception('Please Select Province First');
        $data['items'] = $city->findByNameAndReference($request->name, ['province' => $request->province], 10);
        return $data['items']->toJson();
    }
}
