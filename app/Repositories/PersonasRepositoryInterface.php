<?php

namespace App\Repositories;

interface PersonasRepositoryInterface
{
    public function consultaPersona($tipo_documento,$numero_documento);
}