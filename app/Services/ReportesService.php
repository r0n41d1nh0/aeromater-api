<?php

namespace App\Services;

use App\Repositories\ReportesRepositoryInterface;

class ReportesService
{
    protected $reportesRepository;

    public function __construct(ReportesRepositoryInterface $reportesRepository)
    {
        $this->reportesRepository = $reportesRepository;
    }


    public function salidaDiaria($fecha_desde,$fecha_hasta)
    {
        return $this->reportesRepository->salidaDiaria($fecha_desde,$fecha_hasta);
    }
}