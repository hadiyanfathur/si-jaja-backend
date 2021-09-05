<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('user.index');
    }

    public function block(User $user)
    {
        $this->service->block($user);
        return redirect('/users')->with('success', 'Berhasil mengubah status user');
    }

    public function datatable(){
        return $this->service->datatable();
    }
}
