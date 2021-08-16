<?php

namespace App\Providers;

use App\Constant\UserLevel;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
            
            Passport::tokensExpireIn(now()->addDays(15));
            Passport::refreshTokensExpireIn(now()->addDays(30));
        }

        Gate::before(function ($user, $ability) {
            if ($user->level == UserLevel::ADMINISTRATOR) {
                return true;
            }
        });

        Gate::define('planner', function (User $user){
            return $user->level == UserLevel::PLANNER;
        });

        Gate::define('approver', function (User $user){
            return $user->level == UserLevel::APPROVER;
        });
    }
}
