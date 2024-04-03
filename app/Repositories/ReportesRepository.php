<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ReportesRepository implements ReportesRepositoryInterface
{
    public function salidaDiaria($fecha_desde,$fecha_hasta)
    {
        $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
        $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');
        return DB::select('select * from SP_BALLISTASALIDA_QRY(?, ?)', array($fecha_desde, $fecha_hasta));
    }
}