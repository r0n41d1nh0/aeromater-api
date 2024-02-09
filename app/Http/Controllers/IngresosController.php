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
}
