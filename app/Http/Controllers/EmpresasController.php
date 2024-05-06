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

    public function buscarAgencia(Request $request)
    {
        $agencias=$this->empresasService->buscarAgencia($request->agencia);
        $arr_agencias=[];
        foreach($agencias as $agencia){
            array_push($arr_agencias, utf8_decode($agencia->RAZON_EXTEMPRESA));
        }

        return response()->json($arr_agencias);
    }

}
