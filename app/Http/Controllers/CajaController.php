<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CajaService;
use App\Services\EmpresasService;

class CajaController extends Controller
{
    protected $cajaService,$empresasService;

    public function __construct(CajaService $cajaService,EmpresasService $empresasService)
    {
        $this->cajaService = $cajaService;
        $this->empresasService = $empresasService;
    }

    public function listarDua(Request $request){
        $duas = $this->cajaService->listarDua($request->anio,$request->dua);
        return view('modulos.caja.lista-dua',compact(['duas']));
    }

    public function nuevaDua(){
        $agencias = $this->empresasService->agencias();
        return view('modulos.caja.nueva-dua',compact(['agencias']));
    }

    public function registrarDua(Request $request){
        $request->validate([
            'dua' => 'required',
        ]);

        $manifiesto=$request->tipo.'-'.$request->anio.'-'.$request->numero;

        $this->cajaService->registrarDua(
            $request->dua,
            $request->regimen,
            $manifiesto,
            $request->id_cp,
            $request->cp,
            $request->consignatario,
            $request->agencia,
            $request->fob,
            $request->cif,
            $request->bultos,
            $request->peso,
            $request->fecha_levante,
            $request->hora_levante,
            $request->fecha_salida,
            $request->hora_salida
        );

        return redirect()->route('caja.listar_dua')->withSuccess('Registro exitoso');
    }

    public function editarDua($dua){
        $dua = $this->cajaService->dua($dua);
        $agencias = $this->empresasService->agencias();
        return view('modulos.caja.editar-dua',compact(['dua','agencias']));
    }

    public function actualizarDua(Request $request){
        $request->validate([
            'dua' => 'required',
        ]);

        $manifiesto=$request->tipo.'-'.$request->anio.'-'.$request->numero;

        $this->cajaService->actualizarDua(
            $request->dua,
            $request->regimen,
            $manifiesto,
            $request->id_cp,
            $request->cp,
            $request->consignatario,
            $request->agencia,
            $request->fob,
            $request->cif,
            $request->bultos,
            $request->peso,
            $request->fecha_levante,
            $request->hora_levante,
            $request->fecha_salida,
            $request->hora_salida
        );

        return redirect()->route('caja.editar_dua',[$request->dua])->withSuccess('Actualización exitosa');
    }

    public function nuevaGuiaSalida(){
        $agencias = $this->empresasService->agencias();
        return view('modulos.caja.nueva-guia-salida',compact(['agencias']));
    }
}