<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\IngresosRepository;
use App\Repositories\PersonasRepository;
use App\Repositories\EmpresasRepository;
use App\Repositories\IngresosRepositoryInterface;
use App\Repositories\PersonasRepositoryInterface;
use App\Repositories\EmpresasRepositoryInterface;
use App\Services\IngresosService;
use App\Services\PersonasService;
use App\Services\EmpresasService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IngresosRepositoryInterface::class, IngresosRepository::class);
        $this->app->bind(IngresosService::class, function ($app) { return new IngresosService($app->make(IngresosRepositoryInterface::class)); });

        $this->app->bind(PersonasRepositoryInterface::class, PersonasRepository::class);
        $this->app->bind(PersonasService::class, function ($app) { return new PersonasService($app->make(PersonasRepositoryInterface::class)); });

        $this->app->bind(EmpresasRepositoryInterface::class, EmpresasRepository::class);
        $this->app->bind(EmpresasService::class, function ($app) { return new EmpresasService($app->make(EmpresasRepositoryInterface::class)); });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
