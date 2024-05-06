<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\IngresosRepository;
use App\Repositories\PersonasRepository;
use App\Repositories\EmpresasRepository;
use App\Repositories\ReportesRepository;
use App\Repositories\CajaRepository;
use App\Repositories\ManifiestosRepository;
use App\Repositories\IngresosRepositoryInterface;
use App\Repositories\PersonasRepositoryInterface;
use App\Repositories\EmpresasRepositoryInterface;
use App\Repositories\ReportesRepositoryInterface;
use App\Repositories\CajaRepositoryInterface;
use App\Repositories\ManifiestosRepositoryInterface;
use App\Services\IngresosService;
use App\Services\PersonasService;
use App\Services\EmpresasService;
use App\Services\ReportesService;
use App\Services\CajaService;
use App\Services\ManifiestosService;

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

        $this->app->bind(ReportesRepositoryInterface::class, ReportesRepository::class);
        $this->app->bind(ReportesService::class, function ($app) { return new ReportesService($app->make(ReportesRepositoryInterface::class)); });

        $this->app->bind(CajaRepositoryInterface::class, CajaRepository::class);
        $this->app->bind(CajaService::class, function ($app) { return new CajaService($app->make(CajaRepositoryInterface::class)); });

        $this->app->bind(ManifiestosRepositoryInterface::class, ManifiestosRepository::class);
        $this->app->bind(ManifiestosService::class, function ($app) { return new ManifiestosService($app->make(ManifiestosRepositoryInterface::class)); });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
