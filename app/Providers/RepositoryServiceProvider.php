<?php

namespace App\Providers;

use App\Repositories\Contracts\RoadRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Implementations\RoadRepository;
use App\Repositories\Implementations\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoadRepositoryInterface::class, RoadRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
