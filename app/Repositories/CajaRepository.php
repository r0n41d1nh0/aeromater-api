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
}