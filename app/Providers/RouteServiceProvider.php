<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $apiNamespace = 'App\Http\Controller\Api';

    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Route::prefix('api')
            //     ->middleware('api')
            //     ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // V1 Routes
            Route::prefix('api/v1')->middleware(['api', 'api_version:v1'])->namespace("{$this->apiNamespace}\V1")->group(base_path('routes/api_v1.php'));

             // V2 Routes
            Route::prefix('api/v2')->middleware(['api', 'api_version:v2'])->namespace("{$this->apiNamespace}\V2")->group(base_path('routes/api_v2.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    // protected function mapApiRoutes()
    // {
    //     Route::group([
    //         'middleware' => ['api', 'api_version:v1'],
    //         'namespace' => "{$this->apiNameSpace}\V1",
    //         'prefix' => 'api/v1',
    //     ], function ($router) {
    //         require base_path('routes/api_v1.php');
    //     });
    // }
}
