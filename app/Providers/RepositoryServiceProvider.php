<?php

namespace App\Providers;

use App\Repositories\Contracts\RoadRepositoryInterface;
use App\Repositories\Implementations\RoadRepository;
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
