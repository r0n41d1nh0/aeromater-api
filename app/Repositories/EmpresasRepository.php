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
}