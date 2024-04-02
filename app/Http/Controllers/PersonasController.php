<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PersonasService;

class PersonasController extends Controller
{
    protected $personasService;

    public function __construct(PersonasService $personasService)
    {
        $this->personasService = $personasService;
    }

    public function consultaPersona($tipo_documento,$numero_documento)
    {
        return $this->personasService->consultaPersona($tipo_documento,$numero_documento);
    }

}
