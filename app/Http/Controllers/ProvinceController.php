<?php

namespace App\Http\Controllers;

use App\Repositories\Implementations\ProvinceRepository;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function autocomplete(Request $request, ProvinceRepository $province) {
        $data['items'] = $province->findByName($request->name, 10);
        return $data['items']->toJson();
    }
}
