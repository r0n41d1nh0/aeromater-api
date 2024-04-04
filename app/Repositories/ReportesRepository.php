<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ReportesRepository implements ReportesRepositoryInterface
{
    public function salidaDiaria($fecha_desde,$fecha_hasta)
    {
        $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
        $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');
        return DB::select('select K_FECHA,K_MANIFIESTO,K_DUA,K_GUIA,K_EMPRESA,K_BULTOS,K_PESO from SP_BALLISTASALIDA_QRY(?, ?)', array($fecha_desde, $fecha_hasta));
    }

    public function listaManifiesto($tipo_ingreso,$anio,$numero,$consignatario,$fecha_desde,$fecha_hasta)
    { 
        $fecha_desde=date_format(date_create_from_format('d/m/Y', $fecha_desde), 'Y-m-d');
        $fecha_hasta=date_format(date_create_from_format('d/m/Y', $fecha_hasta), 'Y-m-d');

        $where = " and ID_ADUTIPOINGRESO='".$tipo_ingreso."'";

        if($numero!=''){
            $where .= " and CODIGO_ADUMANIFIESTO like '%-".$anio."-%".trim($numero)."'";
        } else {
            if($fecha_desde!='') {
                $where .= " and FECHAINGRESO_BALBALANZA >= '".$fechaDesde."'";
            }

            if($fecha_hasta!='') {
                $where .= " and FECHAINGRESO_BALBALANZA <= '".$fechaHasta."'";
            }
        }

        if(trim($consignatario)!=''){
            $where .= " and RAZON_EXTEMPRESA containing '".trim($consignatario)."'";
        }

        return DB::select('select 
                CODIGO_ADUMANIFIESTO, 
                FECHAINGRESO_BALBALANZA, 
                HORAINGRESO_BALBALANZA, 
                FECHASALIDA_BALBALANZA, 
                HORASALIDA_BALBALANZA, 
                CODIGO_ADUCARTAPORTE, 
                RAZON_EXTEMPRESA, 
                PESOBRUTO_BALBALANZA, 
                PESOTARA_BALBALANZA, 
                PESONETO_BALBALANZA,
                ID_ADUTIPOINGRESO
                from vw_balListaManifiestos 
                where 1=1 '.$where);
    }

    public function manifiesto($manifiesto)
    {
        $salida=DB::select("select K_PLACA, K_FECHA, K_HORA, K_PESO_BRUTO, K_PESO_TARA, K_PESO, K_EMPRESA, K_CHOFER, K_DUA, K_BULTOS_PROV, K_BULTOS from SP_BALCONSULTAMANI_QRY('".$manifiesto."')");
        $carta=DB::select("select cp.codigo_aduCartaPorte, cp.codigo_aduPuerto, e.razon_extEmpresa, cp.descMercaderia_aduCartaPorte, factura_aduCartaPorte,  marcaContenedor_aduCartaPorte, cp.nroBultosMani_aduCartaPorte, cp.pesoBultosMani_aduCartaPorte,cp.nroBultos_aduCartaPorte,cp.pesoBultos_aduCartaPorte from aduCartaPorte cp  inner join extEmpresa e on cp.id_extEmpresa=e.id_extEmpresa where cp.id_aduCartaPorte in (select distinct(id_aduCartaPorte) from aduManifiestoBalanza where codigo_aduManifiesto ='".$manifiesto."')");
		$balanza=DB::select("select b.placa_balBalanza,b.fechaIngreso_balBalanza, b.horaIngreso_balBalanza, b.fechaSalida_balBalanza, b.horaSalida_balBalanza, b.pesoBruto_balBalanza, b.pesotara_balBalanza, b.pesoNeto_balBalanza, e.razon_extEmpresa, p.nombresApellidos_genPersona from balBalanza b inner join balIngreso bi on b.id_balBalanza=bi.id_balBalanza inner join extEmpresa e on b.id_extEmpresa=e.id_extEmpresa inner join genPersona p on b.id_genPersona=p.id_genPersona where b.id_balBalanza in (select distinct(id_balBalanza) from aduManifiestoBalanza where codigo_aduManifiesto='".$manifiesto."')");
		$manifiesto=DB::select("select procedencia_aduManifiesto, codigo_aduManifiesto, nroBultos_aduManifiesto, pesoBultos_aduManifiesto, nroBultosMani_aduManifiesto, pesoBultosMani_aduManifiesto, nroBultosFalta_aduManifiesto, pesoBultosFalta_aduManifiesto, nroBultosSobra_aduManifiesto, pesoBultosSobra_aduManifiesto, nroBultosMal_aduManifiesto, pesoBultosMal_aduManifiesto, nroBultosAbier_aduManifiesto, pesoBultosAbier_aduManifiesto, nroBultosDist_aduManifiesto, pesoBultosDist_aduManifiesto, nroBultosViol_aduManifiesto, pesoBultosViol_aduManifiesto,extraccion_aduManifiesto from aduManifiesto where codigo_aduManifiesto='".$manifiesto."'");
        
		return array($manifiesto,$balanza,$carta,$salida);
    }
}