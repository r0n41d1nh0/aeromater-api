<?php

namespace App\Services;

use App\Repositories\CajaRepositoryInterface;

class CajaService
{
    protected $cajaRepository;

    public function __construct(CajaRepositoryInterface $cajaRepository)
    {
        $this->cajaRepository = $cajaRepository;
    }

    public function listarDua($anio,$dua)
    {
        return $this->cajaRepository->listarDua($anio,$dua);
    }

    public function registrarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida)
    {
        return $this->cajaRepository->registrarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida);
    }

    public function dua($dua)
    {
        return $this->cajaRepository->dua($dua);
    }

    public function actualizarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida)
    {
        return $this->cajaRepository->actualizarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida);
    }
}