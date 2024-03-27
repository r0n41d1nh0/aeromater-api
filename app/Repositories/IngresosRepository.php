<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class IngresosRepository implements IngresosRepositoryInterface
{
    public function listarIngresosDelDia()
    {
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
            ->where('GENINGRESO.FECHAINGRESO', '=',date('Y-m-d'))
            ->orderByDesc('GENINGRESO.FECHAINGRESO')
            ->orderByDesc('GENINGRESO.HORAINGRESO')
            ->get();
    }

    public function listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento)
    {
        $ingresos=DB::table('GENINGRESO')
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
            ->leftjoin('EXTEMPRESA', 'GENINGRESO.ID_EXTEMPRESA', '=', 'EXTEMPRESA.ID_EXTEMPRESA');

        if($nombres){
            if($fecha_desde and $fecha_hasta){
                $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
                $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');

                if($sin_salida == 'on'){
                    return $ingresos->where('GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA', 'like', '%'.$nombres.'%')->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->whereNull('GENINGRESO.FECHASALIDA')->get();
                }

                return $ingresos->where('GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA', 'like', '%'.$nombres.'%')->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->get();
            }

            if($sin_salida == 'on'){
                return $ingresos->where('GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA', 'like', '%'.$nombres.'%')->whereNull('GENINGRESO.FECHASALIDA')->get();
            }

            return $ingresos->where('GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA', 'like', '%'.$nombres.'%')->get();
        }

        if($numero_documento){
            if($fecha_desde and $fecha_hasta){
                $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
                $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');

                if($sin_salida == 'on'){
                    return $ingresos->where('GENPERSONA.TIPO_DOCUMENTO',$tipo_documento)->where('GENPERSONA.DNI_GENPERSONA',$numero_documento)->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->whereNull('GENINGRESO.FECHASALIDA')->get();
                }

                return $ingresos->where('GENPERSONA.TIPO_DOCUMENTO',$tipo_documento)->where('GENPERSONA.DNI_GENPERSONA',$numero_documento)->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->get();
            }

            if($sin_salida == 'on'){
                return $ingresos->where('GENPERSONA.TIPO_DOCUMENTO',$tipo_documento)->where('GENPERSONA.DNI_GENPERSONA',$numero_documento)->whereNull('GENINGRESO.FECHASALIDA')->get();
            }
        }

        if($fecha_desde and $fecha_hasta){
            $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
            $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');

            if($sin_salida == 'on'){
                return $ingresos->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->whereNull('GENINGRESO.FECHASALIDA')->get();
            }

            return $ingresos->whereBetween('GENINGRESO.FECHAINGRESO', [$fecha_desde, $fecha_hasta])->get();
        }

        return $ingresos->where('GENINGRESO.FECHAINGRESO', '=',date('Y-m-d'))->get();
    }
}