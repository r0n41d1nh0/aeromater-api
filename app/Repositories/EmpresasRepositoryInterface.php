<?php

namespace App\Repositories;

interface EmpresasRepositoryInterface
{
    public function consultaEmpresa($ruc);
    public function buscarAgencia($agencia);
    public function agencias();
}