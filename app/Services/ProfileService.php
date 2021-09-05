<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function update($request){
        $user = User::findOrFail(Auth::id());
        $user->update($request);

        return true;
    }
}
