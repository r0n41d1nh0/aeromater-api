<?php

namespace App\Repositories;

interface CajaRepositoryInterface
{
    public function listarDua($anio,$dua);
    public function registrarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida);
    public function dua($dua);
    public function actualizarDua($dua,$regimen,$manifiesto,$id_cp,$codigo_cp,$empresa,$agencia,$fob,$cif,$bultos,$peso,$fecha_levante,$hora_levante,$fecha_salida,$hora_salida);
}