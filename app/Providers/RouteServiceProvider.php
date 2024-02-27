<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->getHomePath();
    }

    /**
     * Get the home path based on the user's role
     */
    public static function getHomePath(): string
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole(['superadministrator', 'administrator'])) {
                return 'admin/dashboard';
            } else {
                return '/dashboard';
            }
        }

        // Par défaut, retournez le chemin du dashboard
        return '/dashboard';
    }
}
