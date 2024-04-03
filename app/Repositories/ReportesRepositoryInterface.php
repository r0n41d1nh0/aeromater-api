<?php

namespace App\Repositories;

interface ReportesRepositoryInterface
{
    public function salidaDiaria($fecha_desde,$fecha_hasta);
}