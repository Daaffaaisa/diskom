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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home'; // Atau sesuai home route kamu, misalnya '/' atau '/dashboard'

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Ini buat rate limiting API, bisa kamu sesuaikan
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Ini bagian penting yang nge-load route files
        $this->routes(function () {
            // Route untuk API (di file routes/api.php)
            Route::middleware('api')
                ->prefix('api') // Ini yang bikin semua route di api.php otomatis punya prefix /api/
                ->group(base_path('routes/api.php'));

            // Route untuk Web (di file routes/web.php)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Kalau ada channels.php dan console.php juga bisa ditambahkan di sini
            // Route::middleware('api')->group(base_path('routes/channels.php'));
            // Route::middleware('api')->group(base_path('routes/console.php'));
        });
    }
}