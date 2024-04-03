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
            Salidas entre fechas
        </li>
    </ol>
    <p class="lead">Reporte - Salidas entre fechas</p>
    <form action="{{ route('reportes.reporte_salida_diaria') }}" method="get" target="_blank">
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Desde</label>
            <div class="col-md-2">
                <input type="text" name="fecha_desde" id="fecha_desde" value="{{ date('d/m/Y') }}" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Hasta</label>
            <div class="col-md-2">
                <input type="text" name="fecha_hasta" id="fecha_hasta" value="{{ date('d/m/Y') }}" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>

        <hr>
        <input type="submit" class="btn btn-primary btn-sm" value="Generar"> <a href="{{ route('reportes') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
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