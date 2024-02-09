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
}