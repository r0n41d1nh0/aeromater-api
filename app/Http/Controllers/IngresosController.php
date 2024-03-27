<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IngresosService;

class IngresosController extends Controller
{
    protected $ingresosService;

    public function __construct(IngresosService $ingresosService)
    {
        $this->ingresosService = $ingresosService;
    }

    public function listarIngresosDelDia()
    {
        $ingresos = $this->ingresosService->listarIngresosDelDia();
        return response()->json(['ingresos' => $ingresos]);
    }

    public function listar(Request $request){
        $ingresos = $this->ingresosService->listarIngresos($request->nombres,$request->fecha_desde,$request->fecha_hasta,$request->chk_salida,$request->tipo_documento,$request->numero_documento);
        $condiciones = array('Empleado'=>'1','Visitante'=>'2','Autoridad'=>'3','Usuario'=>'4','Contratista'=>'5','Despachador'=>'6','Chofer'=>'7','Estibador'=>'8','Otros'=>'9');
        return view('modulos.ingresos.index',compact(['ingresos','condiciones']));
    }
}
