<?php

namespace App\Providers;

use App\Interfaces\V1\AuthInterface as V1AuthInterface;
use App\Services\V1\AuthService as V1AuthService;
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
        // $this->app->bind(V1AuthInterface::class, V1AuthService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
