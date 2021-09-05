<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        return view('profile.show');
    }

    public function update(ProfileRequest $request)
    {
        $this->service->update($request->validated());
        return redirect('/profile')->with('success', 'Profile berhasil diubah');
    }

    public function passwordUpdate(PasswordChangeRequest $request)
    {
        $this->service->update($request->validated());
        return redirect('/profile')->with('success', 'Password berhasil diubah');
    }
}
