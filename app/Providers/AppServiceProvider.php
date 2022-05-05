<?php

namespace App\Providers;

use App\Http\Repositories\V1\Interfaces\NoteInterface;
use App\Http\Repositories\V1\NoteRepository;
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
        $this->app->bind(NoteInterface::class, NoteRepository::class);
        // $this->
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
