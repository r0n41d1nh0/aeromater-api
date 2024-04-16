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
}