<?php

namespace App\Repositories;

interface ReportesRepositoryInterface
{
    public function salidaDiaria($fecha_desde,$fecha_hasta);
    public function listaManifiesto($tipo_ingreso,$anio,$numero,$consignatario,$fecha_desde,$fecha_hasta);
    public function manifiesto($manifiesto);
    public function ingresos($fecha_desde,$fecha_hasta,$tipo);
    public function reporteMovimientoConsignatario($fecha_desde,$fecha_hasta,$tipo,$valor);
}