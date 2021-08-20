<?php

namespace App\Http\Controllers;

use App\Repositories\Implementations\VillageRepository;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function autocomplete(Request $request, VillageRepository $village) {
        if($request->district == '')
            throw new \Exception('Please Select District First');
        $data['items'] = $village->findByNameAndReference($request->name, ['district' => $request->district], 10);
        return $data['items']->toJson();
    }
}
