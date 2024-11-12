<?php

namespace App\Providers;

use App\Repositories\v1\AuthRepository;
use App\Repositories\v1\Interfaces\AuthRepositoryInterface;
use App\Repositories\v1\Interfaces\AuthServiceInterface;
use App\Services\v1\AuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );
        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
