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
            Movimiento de mercaderia por cliente
        </li>
    </ol>
    <p class="lead">Reporte - Movimiento de mercaderia por cliente</p>
    <form action="{{ route('reportes.reporte_movimiento_consignatario') }}" method="get" target="_blank">
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Por</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <select name="por" id="por" class="form-control form-control-sm">
                            <option value="1">RUC</option>
                            <option value="2">Consignatario</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="valor" class="form-control form-control-sm" autocomplete="off"> 
                    </div>
                </div>
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