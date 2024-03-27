<?php

namespace App\Repositories;

interface IngresosRepositoryInterface
{
    public function listarIngresosDelDia();
    public function listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento);
}