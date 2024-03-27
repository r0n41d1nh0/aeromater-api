<?php

namespace App\Services;

use App\Repositories\IngresosRepositoryInterface;

class IngresosService
{
    protected $ingresosRepository;

    public function __construct(IngresosRepositoryInterface $ingresosRepository)
    {
        $this->ingresosRepository = $ingresosRepository;
    }

    public function listarIngresosDelDia()
    {
        return $this->ingresosRepository->listarIngresosDelDia();
    }

    public function listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento)
    {
        return $this->ingresosRepository->listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento);
    }
}