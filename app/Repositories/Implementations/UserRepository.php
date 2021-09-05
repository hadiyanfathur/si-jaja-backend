<?php

namespace App\Repositories\Implementations;

use App\Constant\UserLevel;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function findAll() : Builder
    {
        return User::query();
    }

    public function findActive() : Builder
    {
        return $this->findAll()->where('active', 1);
    }

    public function findIsNotAdmin()
    {
        return $this->findAll()->where('level', '!=', UserLevel::ADMINISTRATOR);
    }
}
