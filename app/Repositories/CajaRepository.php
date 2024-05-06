<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CajaRepository implements CajaRepositoryInterface
{
    public function listarDua($anio,$dua)  
    {
        if($anio!=''){
            return DB::table('VW_ADULISTADUA')
                ->select('CODIGO_ADUDUA', 'CODIGO_ADUMANIFIESTO', 'CODIGO_ADUCARTAPORTE', 'RAZON_EXTEMPRESA')
                ->where('CODIGO_ADUDUA', 'like', '172-%'.$anio.'-%-%'.$dua)
                ->paginate(10);
        }

        return [];
    }

    public function registrarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida)
    {
        $consignatario=DB::select('select ID_EXTEMPRESA from sp_extBuscarEmpresaId(?)',array($empresa))[0]->ID_EXTEMPRESA;
        $agencia=DB::select('select ID_EXTEMPRESA from SP_EXTBUSCAREMPADUANAID(?)',array($agencia))[0]->ID_EXTEMPRESA;

        if ($fecha_levante){
            $fecha_levante=date_format(date_create_from_format('d/m/Y', $fecha_levante), 'Y-m-d');
        }
        if ($fecha_salida){
            $fecha_salida=date_format(date_create_from_format('d/m/Y', $fecha_salida), 'Y-m-d');
        }

        DB::table('ADUDUA')->insert([
            'ADUDUA.CODIGO_ADUDUA' => $dua,
            'ADUDUA.CODIGO_ADUMANIFIESTO' => $manifiesto,
            'ADUDUA.ID_EXTEMPRESA' => $consignatario,
            'ADUDUA.ID_EXTAGENCIA' => $agencia,
            'ADUDUA.FOB_ADUDUA' => $fob,
            'ADUDUA.CIF_ADUDUA' => $cif,
            'ADUDUA.NROBULTOS_ADUDUA' => $bultos,
            'ADUDUA.PESOBULTOS_ADUDUA' => $peso,
            'ADUDUA.REGIMEN_ADUDUA' => $regimen,
            'ADUDUA.CODIGO_ADUCARTAPORTE' => $codigo_cp,
            'ADUDUA.ID_ADUCARTAPORTE' => $id_cp,
            'ADUDUA.FECHA_LEVANTE' => $fecha_levante,
            'ADUDUA.HORA_LEVANTE' => $hora_levante,
            'ADUDUA.FECHA_SALIDA' => $fecha_salida,
            'ADUDUA.HORA_SALIDA' => $hora_salida
        ]);
    }

    public function dua($dua)
    {
        return DB::table('ADUDUA')
            ->select(
                'ADUDUA.CODIGO_ADUDUA',
                'ADUDUA.REGIMEN_ADUDUA',
                'ADUDUA.CODIGO_ADUMANIFIESTO', 
                'ADUDUA.CODIGO_ADUCARTAPORTE', 
                'CONSIGNATARIO.RAZON_EXTEMPRESA AS CONSIGNATARIO', 
                'AGENCIA.RAZON_EXTEMPRESA AS AGENCIA', 
                'ADUDUA.FOB_ADUDUA', 
                'ADUDUA.CIF_ADUDUA', 
                'ADUCARTAPORTE.DESCMERCADERIA_ADUCARTAPORTE', 
                'ADUDUA.NROBULTOS_ADUDUA', 
                'ADUDUA.PESOBULTOS_ADUDUA', 
                'ADUDUA.ID_ADUCARTAPORTE', 
                'CONSIGNATARIO.RUC_EXTEMPRESA', 
                'ADUDUA.FECHA_LEVANTE',
                'ADUDUA.HORA_LEVANTE',
                'ADUDUA.FECHA_SALIDA',
                'ADUDUA.HORA_SALIDA'
            )
            ->join('ADUCARTAPORTE', 'ADUCARTAPORTE.ID_ADUCARTAPORTE', '=', 'ADUDUA.ID_ADUCARTAPORTE')
            ->join('EXTEMPRESA AS AGENCIA', 'AGENCIA.ID_EXTEMPRESA', '=', 'ADUDUA.ID_EXTAGENCIA')
            ->leftjoin('EXTEMPRESA AS CONSIGNATARIO', 'CONSIGNATARIO.ID_EXTEMPRESA', '=', 'ADUDUA.ID_EXTEMPRESA')
            ->where('ADUDUA.CODIGO_ADUDUA',$dua)->first();
    }

    public function actualizarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida)
    {
        $consignatario=DB::select('select ID_EXTEMPRESA from sp_extBuscarEmpresaId(?)',array($empresa))[0]->ID_EXTEMPRESA;
        $agencia=DB::select('select ID_EXTEMPRESA from SP_EXTBUSCAREMPADUANAID(?)',array($agencia))[0]->ID_EXTEMPRESA;

        if ($fecha_levante){
            $fecha_levante=date_format(date_create_from_format('d/m/Y', $fecha_levante), 'Y-m-d');
        }
        if ($fecha_salida){
            $fecha_salida=date_format(date_create_from_format('d/m/Y', $fecha_salida), 'Y-m-d');
        }

        DB::table('ADUDUA')
        ->where('ADUDUA.CODIGO_ADUDUA', $dua)
        ->update([
            'ADUDUA.CODIGO_ADUMANIFIESTO' => $manifiesto,
            'ADUDUA.ID_EXTEMPRESA' => $consignatario,
            'ADUDUA.ID_EXTAGENCIA' => $agencia,
            'ADUDUA.FOB_ADUDUA' => $fob,
            'ADUDUA.CIF_ADUDUA' => $cif,
            'ADUDUA.NROBULTOS_ADUDUA' => $bultos,
            'ADUDUA.PESOBULTOS_ADUDUA' => $peso,
            'ADUDUA.REGIMEN_ADUDUA' => $regimen,
            'ADUDUA.CODIGO_ADUCARTAPORTE' => $codigo_cp,
            'ADUDUA.ID_ADUCARTAPORTE' => $id_cp,
            'ADUDUA.FECHA_LEVANTE' => $fecha_levante,
            'ADUDUA.HORA_LEVANTE' => $hora_levante,
            'ADUDUA.FECHA_SALIDA' => $fecha_salida,
            'ADUDUA.HORA_SALIDA' => $hora_salida
        ]);
    }
}