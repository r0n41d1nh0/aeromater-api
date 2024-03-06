<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class IngresosRepository implements IngresosRepositoryInterface
{
    public function listarIngresosDelDia()
    {
        $fechaActual = now()->toDateString();

        return DB::table('GENINGRESO')
            ->select(
                'GENINGRESO.ID_GENPERSONA',
                'GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA',
                'GENPERSONA.TIPO_DOCUMENTO', 
                'GENPERSONA.DNI_GENPERSONA', 
                'GENINGRESO.CONDICION', 
                'GENINGRESO.MOTIVO', 
                'GENINGRESO.DOCUMENTO_ADU_ASOC', 
                'GENINGRESO.ID_EXTEMPRESA', 
                'EXTEMPRESA.RUC_EXTEMPRESA', 
                'EXTEMPRESA.RAZON_EXTEMPRESA', 
                'GENINGRESO.FECHAINGRESO', 
                'GENINGRESO.HORAINGRESO', 
                'GENINGRESO.FECHASALIDA', 
                'GENINGRESO.HORASALIDA' 
            )
            ->join('GENPERSONA', 'GENINGRESO.ID_GENPERSONA', '=', 'GENPERSONA.ID_GENPERSONA')
            ->leftjoin('EXTEMPRESA', 'GENINGRESO.ID_EXTEMPRESA', '=', 'EXTEMPRESA.ID_EXTEMPRESA')
            ->where('GENINGRESO.FECHAINGRESO', '=','2024-02-27')
            ->orderByDesc('GENINGRESO.FECHAINGRESO')
            ->orderByDesc('GENINGRESO.HORAINGRESO')
            ->get();
    }
}