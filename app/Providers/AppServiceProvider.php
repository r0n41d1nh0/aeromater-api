<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\IngresosRepository;
use App\Repositories\IngresosRepositoryInterface;
use App\Services\IngresosService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IngresosRepositoryInterface::class, IngresosRepository::class);
        $this->app->bind(IngresosService::class, function ($app) {
            return new IngresosService($app->make(IngresosRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
