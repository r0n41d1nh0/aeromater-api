<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportesService;

class ReportesController extends Controller
{
    protected $reportesService;

    public function __construct(ReportesService $reportesService)
    {
        $this->reportesService = $reportesService;
    }

    public function salidaDiaria(){
        return view('modulos.reportes.salida_diaria');
    }

    public function reporteSalidaDiaria(Request $request)
    {
        $desde=$request->fecha_desde;
        $hasta=$request->fecha_hasta;
        $datos=$this->reportesService->salidaDiaria($desde,$hasta);
        return view('modulos.reportes.reporte_salida_diaria',compact(['datos','desde','hasta']));
    }

    public function manifiesto(Request $request){
        if(isset($request->tipo_ingreso)){
            $datos=$this->reportesService->listaManifiesto($request->tipo_ingreso,$request->anio,$request->numero,$request->consignatario,$request->fecha_desde,$request->fecha_hasta);
        } else {
            $datos=[];
        }
        return view('modulos.reportes.manifiesto',compact(['datos']));
    }

    public function reporteManifiesto($manifiesto){
        $datos=$this->reportesService->manifiesto($manifiesto);
        return view('modulos.reportes.reporte_manifiesto',compact(['datos','manifiesto']));
    }

    public function ingresos(){
        return view('modulos.reportes.ingresos');
    }

    public function reporteIngresos(Request $request){
        $desde=$request->fecha_desde;
        $hasta=$request->fecha_hasta;
        $datos=$this->reportesService->ingresos($request->fecha_desde,$request->fecha_hasta,$request->tipo_ingreso);
        return view('modulos.reportes.reporte_ingresos',compact(['datos','desde','hasta']));
    }
    public function movimientoConsignatario(){
        return view('modulos.reportes.movimiento_consignatario');
    }

    public function reporteMovimientoConsignatario(Request $request){
        $desde=$request->fecha_desde;
        $hasta=$request->fecha_hasta;
        $datos=$this->reportesService->reporteMovimientoConsignatario($request->fecha_desde,$request->fecha_hasta,$request->por,$request->valor);
        return view('modulos.reportes.reporte_movimiento_consignatario',compact(['datos','desde','hasta']));
    }
}