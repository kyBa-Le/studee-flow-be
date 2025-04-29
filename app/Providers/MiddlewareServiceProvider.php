<?php

namespace App\Providers;

use App\Http\Middleware\JwtMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // register the custom middleware instead of using default middleware
        app()->make(Kernel::class)
            ->pushMiddleware(JwtMiddleware::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        // Đăng ký alias 'role'
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }
}
