<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ManifiestosRepository implements ManifiestosRepositoryInterface
{
    public function consultaManifiesto($anio,$numero)
    {
        return DB::select("
            SELECT distinct
                mb.codigo_aduManifiesto,
                cp.codigo_aduCartaPorte,
                e.razon_extEmpresa,
                cp.descMercaderia_aduCartaPorte,
                cp.NROBULTOS_ADUCARTAPORTE,
                cp.id_aduCartaPorte,
                coalesce(e.ruc_extempresa,'') ruc_extempresa
            from aduManifiestoBalanza mb
            inner join aduCartaPorte cp on mb.id_aduCartaPorte=cp.id_aduCartaPorte
            inner join extEmpresa e on cp.id_extEmpresa=e.id_extEmpresa
            where mb.codigo_aduManifiesto
            like '%'||'".$anio."'||'-%'||'".$numero."'
        ");
    }
}