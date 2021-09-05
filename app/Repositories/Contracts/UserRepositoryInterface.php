<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findAll();
    public function findActive();
    public function findIsNotAdmin();
}
