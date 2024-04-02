<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpresasService;

class EmpresasController extends Controller
{
    protected $empresasService;

    public function __construct(EmpresasService $empresasService)
    {
        $this->empresasService = $empresasService;
    }

    public function consultaEmpresa($ruc)
    {
        return $this->empresasService->consultaEmpresa($ruc);
    }

}
