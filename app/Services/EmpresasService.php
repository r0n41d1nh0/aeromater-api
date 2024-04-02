<?php

namespace App\Services;

use App\Repositories\EmpresasRepositoryInterface;

class EmpresasService
{
    protected $empresasRepository;

    public function __construct(EmpresasRepositoryInterface $empresasRepository)
    {
        $this->empresasRepository = $empresasRepository;
    }


    public function consultaEmpresa($ruc)
    {
        return $this->empresasRepository->consultaEmpresa($ruc);
    }
}