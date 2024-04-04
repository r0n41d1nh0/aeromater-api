@extends('layouts.main')
@section('content.css')
    <link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item ">
            <a href="{{ route('reportes') }}">Reportes</a>
        </li>
        <li class="breadcrumb-item ">
            Consulta de manifiesto
        </li>
    </ol>
    <p class="lead">Consulta de manifiesto</p>
    <form action="{{ route('reportes.manifiesto') }}" method="get">
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Tipo de ingreso</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <select name="tipo_ingreso" id="tipo_ingreso" class="form-control form-control-sm">
                            <option value="1">IMPORTACION</option>
                            <option value="2">EXPORTACION</option>
                            <option value="3">IMPORTACION TEMPORAL</option>
                            <option value="4">ALMACENAJE SIMPLE</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Numero</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="anio" value="{{ date('Y') }}" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="text" name="numero" class="form-control form-control-sm" autocomplete="off"> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Consignatario</label>
            <div class="col-md-6">
                <input type="text" name="consignatario" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha</label>
            <div class="col-md-6">
                <div class="row">
                    <label class="col">
                        Desde
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="fecha_desde" id="fecha_desde" value="{{ date('d/m/Y') }}" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <label class="col">
                        Hasta
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="fecha_hasta" id="fecha_hasta" value="{{ date('d/m/Y') }}" class="form-control form-control-sm" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary btn-sm" name="btnBuscar" value="Buscar"> <a href="{{ route('reportes') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
    <br>
    <div class="table-responsive" >
        <table class="table table-striped table-bordered table-condensed table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Manifiesto</th>
                    <th>Fecha de ingreso</th>
                    <th>Fecha de salida</th>
                    <th>Carta porte</th>
                    <th>Empresa</th>
                    <th>Peso bruto</th>
                    <th>Peso tara</th>
                    <th>Peso neto</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato->CODIGO_ADUMANIFIESTO }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->FECHAINGRESO_BALBALANZA)) }} {{ $dato->HORAINGRESO_BALBALANZA }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->FECHASALIDA_BALBALANZA)) }} {{ $dato->HORASALIDA_BALBALANZA }}</td>
                    <td>{{ $dato->CODIGO_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->RAZON_EXTEMPRESA }}</td>
                    <td>{{ $dato->PESOBRUTO_BALBALANZA }}</td>
                    <td>{{ $dato->PESOTARA_BALBALANZA }}</td>
                    <td>{{ $dato->PESONETO_BALBALANZA }}</td>
                    <td><a href="{{ route('reportes.reporte_manifiesto', $dato->CODIGO_ADUMANIFIESTO) }}" target="_blank">Datos</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('content.js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.js') }}"></script>
    <script>
        $('#fecha_desde').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

        $('#fecha_hasta').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

    </script>
@endsection
