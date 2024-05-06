<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EmpresasRepository implements EmpresasRepositoryInterface
{
    public function consultaEmpresa($ruc)
    {
        if(DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->count() > 0) {
            $empresa=DB::table('EXTEMPRESA')->where('RUC_EXTEMPRESA',$ruc)->first();
            return json_encode($empresa);
        } else {
            $token = 'apis-token-5476.vL8QNZvaAWb4Ees11q3xeDooXp1Putv5';
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $ruc,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: http://apis.net.pe/api-ruc',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            return json_decode(json_encode($response));
        }
    }

    public function buscarAgencia($agencia)
    {
        $agencia=mb_strtoupper($agencia, 'UTF-8');
        $agencias=DB::table('EXTEMPRESA')
            ->select(
                'EXTEMPRESA.RAZON_EXTEMPRESA'
            )
            ->join('EXTAGENCIA', 'EXTEMPRESA.ID_EXTEMPRESA', '=', 'EXTAGENCIA.ID_EXTEMPRESA')
            ->where('EXTEMPRESA.RAZON_EXTEMPRESA', 'CONTAINING', $agencia)->take(10)->get('EXTEMPRESA.RAZON_EXTEMPRESA');

        return $agencias;
    }

    public function agencias()
    {
        $agencias=DB::table('EXTEMPRESA')
            ->select([
                DB::raw("COALESCE(EXTEMPRESA.RAZON_EXTEMPRESA, '') AS RAZON_EXTEMPRESA")
            ])
            ->join('EXTAGENCIA', 'EXTEMPRESA.ID_EXTEMPRESA', '=', 'EXTAGENCIA.ID_EXTEMPRESA')
            ->pluck('RAZON_EXTEMPRESA');

        return $agencias;
    }
}