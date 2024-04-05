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

    public function listaManifiesto($tipo_ingreso,$anio,$numero,$consignatario,$fecha_desde,$fecha_hasta)
    {
        return $this->reportesRepository->listaManifiesto($tipo_ingreso,$anio,$numero,$consignatario,$fecha_desde,$fecha_hasta);
    }

    public function manifiesto($manifiesto)
    {
        return $this->reportesRepository->manifiesto($manifiesto);
    }

    public function ingresos($fecha_desde,$fecha_hasta,$tipo)
    {
        return $this->reportesRepository->ingresos($fecha_desde,$fecha_hasta,$tipo);
    }

    public function reporteMovimientoConsignatario($fecha_desde,$fecha_hasta,$tipo,$valor)
    {
        return $this->reportesRepository->reporteMovimientoConsignatario($fecha_desde,$fecha_hasta,$tipo,$valor);
    }
}