<?php

namespace App\Repositories;

interface ReportesRepositoryInterface
{
    public function salidaDiaria($fecha_desde,$fecha_hasta);
    public function listaManifiesto($tipo_ingreso,$anio,$numero,$consignatario,$fecha_desde,$fecha_hasta);
    public function manifiesto($manifiesto);
}