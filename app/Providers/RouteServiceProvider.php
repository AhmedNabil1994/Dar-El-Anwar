<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */


    protected $namespace = 'App\Http\Controllers';
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();


        $this->mapWebRoutes();

        $this->mapAdminRoutes();
        $this->mapStudentRoutes();
        $this->mapInstructorRoutes();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

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

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth:admins'])
            ->prefix('admin')
            ->namespace($this->namespace. '\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapStudentRoutes()
    {
        Route::middleware(['web', 'auth:students'])
            ->prefix('student')
            ->as('student.')
            ->namespace($this->namespace. '\Student')
            ->group(base_path('routes/student.php'));
    }


    protected function mapInstructorRoutes()
    {
        Route::middleware(['web', 'auth:instructors'])
            ->prefix('instructor')
            ->as('instructor.')
            ->namespace($this->namespace. '\Instructor')
            ->group(base_path('routes/instructor.php'));
    }
}
