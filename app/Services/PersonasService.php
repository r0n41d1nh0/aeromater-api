<?php

namespace App\Services;

use App\Repositories\PersonasRepositoryInterface;

class PersonasService
{
    protected $personasRepository;

    public function __construct(PersonasRepositoryInterface $personasRepository)
    {
        $this->personasRepository = $personasRepository;
    }


    public function consultaPersona($tipo_documento,$numero_documento)
    {
        return $this->personasRepository->consultaPersona($tipo_documento,$numero_documento);
    }
}