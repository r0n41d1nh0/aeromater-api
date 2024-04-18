<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CajaService;

class CajaController extends Controller
{
    protected $cajaService;

    public function __construct(CajaService $cajaService)
    {
        $this->cajaService = $cajaService;
    }

    public function listarDua(Request $request){
        $duas = $this->cajaService->listarDua($request->anio,$request->dua);
        return view('modulos.caja.lista-dua',compact(['duas']));
    }

    public function nuevaDua(){
        return view('modulos.caja.nueva-dua');
    }
}