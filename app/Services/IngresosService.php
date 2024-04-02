<?php

namespace App\Services;

use App\Repositories\IngresosRepositoryInterface;

class IngresosService
{
    protected $ingresosRepository;

    public function __construct(IngresosRepositoryInterface $ingresosRepository)
    {
        $this->ingresosRepository = $ingresosRepository;
    }

    public function listarIngresosDelDia()
    {
        return $this->ingresosRepository->listarIngresosDelDia();
    }

    public function listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento)
    {
        return $this->ingresosRepository->listarIngresos($nombres,$fecha_desde,$fecha_hasta,$sin_salida,$tipo_documento,$numero_documento);
    }

    public function registrarIngreso($tipo_documento,$numero_documento,$nombres,$ruc,$razon_social,$condicion,$motivo,$documento_asociado,$fecha_ingreso,$hora_ingreso)
    {
        return $this->ingresosRepository->registrarIngreso($tipo_documento,$numero_documento,$nombres,$ruc,$razon_social,$condicion,$motivo,$documento_asociado,$fecha_ingreso,$hora_ingreso);
    }

    public function ingreso($id_genpersona,$fecha_ingreso,$hora_ingreso)
    {
        return $this->ingresosRepository->ingreso($id_genpersona,$fecha_ingreso,$hora_ingreso);
    }

    public function actualizarIngreso($id_genpersona,$fecha_ingreso_original,$hora_ingreso_original,$ruc,$razon_social,$fecha_ingreso,$hora_ingreso,$fecha_salida,$hora_salida,$condicion,$motivo,$documento_asociado)
    {
        return $this->ingresosRepository->actualizarIngreso($id_genpersona,$fecha_ingreso_original,$hora_ingreso_original,$ruc,$razon_social,$fecha_ingreso,$hora_ingreso,$fecha_salida,$hora_salida,$condicion,$motivo,$documento_asociado);
    }

    public function borrarIngreso($id_genpersona,$fecha_ingreso,$hora_ingreso)
    {
        return $this->ingresosRepository->borrarIngreso($id_genpersona,$fecha_ingreso,$hora_ingreso);
    }

}