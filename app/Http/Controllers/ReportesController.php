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

    public function salida_diaria(){
        return view('modulos.reportes.salida_diaria');
    }

    public function reporteSalidaDiaria(Request $request)
    {
        $desde=$request->fecha_desde;
        $hasta=$request->fecha_hasta;
        $datos=$this->reportesService->salidaDiaria($desde,$hasta);
        return view('modulos.reportes.reporte_salida_diaria',compact(['datos','desde','hasta']));
    }
    
}