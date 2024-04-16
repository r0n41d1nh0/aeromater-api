<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CajaRepository implements CajaRepositoryInterface
{
    public function listarDua($anio,$dua)  
    {
        if($anio!=''){
            return DB::select("select CODIGO_ADUDUA,CODIGO_ADUMANIFIESTO,CODIGO_ADUCARTAPORTE,RAZON_EXTEMPRESA from vw_aduListaDua where codigo_aduDua like '172-%".$anio."-%-%".$dua."'");
        }

        return [];
    }
}