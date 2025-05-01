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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        // Đăng ký alias 'role'
        Route::aliasMiddleware('role', RoleMiddleware::class);
        Route::aliasMiddleware('jwt', JwtMiddleware::class);
    }
}
