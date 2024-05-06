<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManifiestosService;

class ManifiestosController extends Controller
{
    protected $manifiestosService;

    public function __construct(ManifiestosService $manifiestosService)
    {
        $this->manifiestosService = $manifiestosService;
    }

    public function consultaManifiesto(Request $request){
        $manifiestos = $this->manifiestosService->consultaManifiesto($request->anio,$request->numero);
        return response()->json($manifiestos);
    }

}