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

    public function nuevo(){
        return view('modulos.ingresos.nuevo');
    }

    public function registrarIngreso(Request $request){
        $request->validate([
            'tipo_documento' => 'required',
            'numero_documento' => 'required',
            'nombres' => 'required',
            'condicion' => 'required',
            'fecha_ingreso' => 'required',
            'hora_ingreso' => 'required',
            
        ]);

        $this->ingresosService->registrarIngreso($request->tipo_documento,$request->numero_documento,$request->nombres,$request->ruc,$request->razon_social,$request->condicion,$request->motivo,$request->documento_adu_asoc,$request->fecha_ingreso,$request->hora_ingreso);

        return redirect()->route('ingresos')->withSuccess('Registro exitoso');
    }

    public function editar($id_persona,$fecha_ingreso,$hora_ingreso){
        $ingreso = $this->ingresosService->ingreso($id_persona,$fecha_ingreso,$hora_ingreso);
        return view('modulos.ingresos.editar',compact(['ingreso']));
    }

    public function actualizarIngreso(Request $request){
        $request->validate([
            'condicion' => 'required',
            'fecha_ingreso' => 'required',
            'hora_ingreso' => 'required',
        ]);

        $this->ingresosService->actualizarIngreso(
            $request->id_genpersona,
            $request->fecha_ingreso_original,
            $request->hora_ingreso_original,
            $request->ruc,
            $request->razon_social,
            $request->fecha_ingreso,
            $request->hora_ingreso,
            $request->fecha_salida,
            $request->hora_salida,
            $request->condicion,
            $request->motivo,
            $request->documento_adu_asoc);

        return redirect()->route('ingresos.editar',[$request->id_genpersona,date_format(date_create_from_format('d/m/Y', $request->fecha_ingreso), 'Y-m-d'),$request->hora_ingreso])->withSuccess('Actualización exitosa');

    }

    public function borrarIngreso(Request $request){
        $ingreso = $this->ingresosService->borrarIngreso($request->id_genpersona,$request->fecha_ingreso,$request->hora_ingreso);
        return redirect()->route('ingresos')->withSuccess('Borrado exitoso');
    }
}
