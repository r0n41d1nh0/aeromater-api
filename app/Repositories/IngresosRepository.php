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

    public function registrarIngreso($tipo_documento,$numero_documento,$nombres,$ruc,$razon_social,$condicion,$motivo,$documento_asociado,$fecha_ingreso,$hora_ingreso)
    {
        if(DB::table('GENPERSONA')->where('TIPO_DOCUMENTO',$tipo_documento)->where('DNI_GENPERSONA',$numero_documento)->count() > 0) {
            $persona=DB::table('GENPERSONA')->where('TIPO_DOCUMENTO',$tipo_documento)->where('DNI_GENPERSONA',$numero_documento)->first();
            $id_genpersona=$persona->ID_GENPERSONA;
            DB::table('GENPERSONA')
            ->where('GENPERSONA.ID_GENPERSONA', $id_genpersona)
            ->update([
                'GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA' => $nombres
            ]);
        } else {
            $id_genpersona=DB::table('SP_GET_ID_GENPERSONA')->select('ID_GENPERSONA')->first();
            DB::table('GENPERSONA')->insert([
                'GENPERSONA.ID_GENPERSONA' => $id_genpersona,
                'GENPERSONA.NOMBRESAPELLIDOS_GENPERSONA' => $nombres,
                'GENPERSONA.DNI_GENPERSONA' => $numero_documento,
                'GENPERSONA.TIPO_DOCUMENTO' => $tipo_documento
            ]);
        }

        if(trim($ruc)!=''){
            if(DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->count() > 0) {
                $id_extempresa=DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->first();
            } else {
                $id_extempresa=DB::table('SP_GET_ID_EXTEMPRESA')->select('ID_EXTEMPRESA')->first();
                DB::table('EXTEMPRESA')->insert([
                    'EXTEMPRESA.ID_EXTEMPRESA' => $id_extempresa,
                    'EXTEMPRESA.RUC_EXTEMPRESA' => $ruc,
                    'EXTEMPRESA.RAZON_EXTEMPRESA' => $razon_social
                ]);
            }
        } else {
            $id_extempresa=null;
        }

        DB::table('GENINGRESO')->insert([
            'GENINGRESO.ID_GENPERSONA' => $id_genpersona,
            'GENINGRESO.CONDICION' => $condicion,
            'GENINGRESO.MOTIVO' => $motivo,
            'GENINGRESO.DOCUMENTO_ADU_ASOC' => $documento_asociado,
            'GENINGRESO.ID_EXTEMPRESA' => $id_extempresa,
            'GENINGRESO.FECHAINGRESO' => date_format(date_create_from_format('d/m/Y', $fecha_ingreso), 'Y-m-d'),
            'GENINGRESO.HORAINGRESO' => $hora_ingreso,
        ]);
    }

    public function ingreso($id_genpersona,$fecha_ingreso,$hora_ingreso)
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
            ->where('GENINGRESO.ID_GENPERSONA',$id_genpersona)
            ->where('GENINGRESO.FECHAINGRESO',$fecha_ingreso)
            ->where('GENINGRESO.HORAINGRESO',$hora_ingreso)->first();
    }

    public function actualizarIngreso($id_genpersona,$fecha_ingreso_original,$hora_ingreso_original,$ruc,$razon_social,$fecha_ingreso,$hora_ingreso,$fecha_salida,$hora_salida,$condicion,$motivo,$documento_asociado)
    {
        if(trim($ruc)!=''){
            if(DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->count() > 0) {
                $id_extempresa=DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->first()->ID_EXTEMPRESA;
            } else {
                $id_extempresa=DB::table('SP_GET_ID_EXTEMPRESA')->select('ID_EXTEMPRESA')->first();
                DB::table('EXTEMPRESA')->insert([
                    'EXTEMPRESA.ID_EXTEMPRESA' => $id_extempresa,
                    'EXTEMPRESA.RUC_EXTEMPRESA' => $ruc,
                    'EXTEMPRESA.RAZON_EXTEMPRESA' => $razon_social
                ]);
            }
        } else {
            $id_extempresa=null;
        }

        DB::table('GENINGRESO')
        ->where('GENINGRESO.ID_GENPERSONA', $id_genpersona)
        ->where('GENINGRESO.FECHAINGRESO', $fecha_ingreso_original)
        ->where('GENINGRESO.HORAINGRESO', $hora_ingreso_original)
        ->update([
            'GENINGRESO.FECHAINGRESO' => date_format(date_create_from_format('d/m/Y', $fecha_ingreso), 'Y-m-d'),
            'GENINGRESO.HORAINGRESO' => $hora_ingreso,
            'GENINGRESO.FECHASALIDA' => date_format(date_create_from_format('d/m/Y', $fecha_salida), 'Y-m-d'),
            'GENINGRESO.HORASALIDA' => $hora_salida,
            'GENINGRESO.CONDICION' => $condicion,
            'GENINGRESO.MOTIVO' => $motivo,
            'GENINGRESO.DOCUMENTO_ADU_ASOC' => $documento_asociado,
            'GENINGRESO.ID_EXTEMPRESA' => $id_extempresa
        ]);
    }

    public function borrarIngreso($id_genpersona,$fecha_ingreso,$hora_ingreso)
    {
        DB::table('GENINGRESO')
        ->where('GENINGRESO.ID_GENPERSONA', $id_genpersona)
        ->where('GENINGRESO.FECHAINGRESO', $fecha_ingreso)
        ->where('GENINGRESO.HORAINGRESO', $hora_ingreso)
        ->delete();
    }
}

