<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PersonasRepository implements PersonasRepositoryInterface
{
    public function consultaPersona($tipo_documento,$numero_documento)
    {
        if(DB::table('GENPERSONA')->where('TIPO_DOCUMENTO',$tipo_documento)->where('DNI_GENPERSONA',$numero_documento)->count() > 0) {
            $persona=DB::table('GENPERSONA')->where('TIPO_DOCUMENTO',$tipo_documento)->where('DNI_GENPERSONA',$numero_documento)->first();
            return json_encode($persona);
        } else {
            if($tipo_documento=='3'){
                $token = 'apis-token-5476.vL8QNZvaAWb4Ees11q3xeDooXp1Putv5';
                $dni = $numero_documento;
        
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 2,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Referer: https://apis.net.pe/consulta-dni-api',
                        'Authorization: Bearer ' . $token
                    ),
                ));
        
                $response = curl_exec($curl);
                curl_close($curl);
        
                return json_decode(json_encode($response));
            }
        }
    }
}