<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data, $message) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => $message,
                'time' => new \DateTime(),
            ]);
        });

        Response::macro('error', function ($message, $status_code) {
            return response()->json([
                'success' => false,
                'error' => $status_code,
                'message' => $message,
                'time' => new \DateTime(),
            ], $status_code);
        });
    }
}
