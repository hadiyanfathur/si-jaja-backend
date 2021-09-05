<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    public function update($request){
        $user = User::findOrFail(Auth::id());

        if(isset($request['password']))
            $request['password'] = Hash::make($request['password']);

        $user->update($request);

        return true;
    }
}
