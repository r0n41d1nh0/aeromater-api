<?php

namespace App\Services;

use App\Repositories\ManifiestosRepositoryInterface;

class ManifiestosService
{
    protected $manifiestosRepository;

    public function __construct(ManifiestosRepositoryInterface $manifiestosRepository)
    {
        $this->manifiestosRepository = $manifiestosRepository;
    }

    public function consultaManifiesto($anio,$numero)
    {
        return $this->manifiestosRepository->consultaManifiesto($anio,$numero);
    }
}