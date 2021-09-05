<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\HasDatatable;

class UserService
{
    use HasDatatable;

    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function block($user){
        if($user->active){
            $user->update(['active' => 0]);
        }else {
            $user->update(['active' => 1]);
        }

        return true;
    }

    public function datatable(){
        $query = $this->repository->findIsNotAdmin();

        $datatable = $this->generate($query->get(), 'user', null);
        $datatable->addColumn('block', function ($model) {
            $map['id'] = $model->id;
            $map['active'] = $model->active;
            $map['block_url'] = route('users.block', $model->id);
            return view('user.user-block', $map);
        });

        return $datatable->make(true);
    }
}
