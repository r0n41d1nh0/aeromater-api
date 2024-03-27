@extends('layouts.main')
@section('content.css')
    <link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item ">Ingresos de personal</li>
    </ol>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <p class="lead">Buscar ingresos de personal</p>
    <form action="{{ route('ingresos') }}" method="get">
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Persona</label>
            <div class="col-md-6">
                <input type="text" name="nombres" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Documento</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <select name="tipo_documento" id="tipo_documento" class="form-control form-control-sm">
                            <option value="1">LT LIBRETA TRIBUTARIA</option>
                            <option value="2">LE LIBRETA ELECTORAL</option>
                            <option value="3" selected="">DNI DOC NACIONAL DE IDENTIDAD</option>
                            <option value="4">RUC REGISTRO UNICO DEL CONTRIBUYENTE</option>
                            <option value="5">CI CARNET DE IDENTIDAD POLICIAL</option>
                            <option value="6">PAS PASAPORTE</option>
                            <option value="7">CE. CARNET DE EXTRANJERIA</option>
                            <option value="8">ORGANIZACIONES INTERNACIONALES</option>
                            <option value="9">SALVOCONDUCTO</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="numero_documento" class="form-control form-control-sm" autocomplete="off"> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Ingresos</label>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="chk_salida">
                    <label class="form-check-label">Sin Salida</label>
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
        <input type="submit" class="btn btn-primary btn-sm" value="Buscar"> <a href="{{ route('ingresos.nuevo') }}" class="btn btn-primary btn-sm">Nuevo</a> <a href="{{ route('inicio') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Persona</th>
                    <th>Condición</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Motivo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingresos as $ingreso)
                <tr>
                    <td>{{ utf8_decode($ingreso->NOMBRESAPELLIDOS_GENPERSONA) }}</td>
                    <td>{{ array_search($ingreso->CONDICION,$condiciones) }}</td>
                    <td>{{ date('d/m/Y', strtotime($ingreso->FECHAINGRESO)) }} {{ $ingreso->HORAINGRESO }} </td>
                    <td>{{ isset($ingreso->FECHASALIDA) ? date('d/m/Y', strtotime($ingreso->FECHASALIDA)) : '' }} {{ isset($ingreso->HORASALIDA) ? $ingreso->HORASALIDA : '' }} </td>
                    <td>{{ $ingreso->MOTIVO }}</td>
                    <td><a href="" class="">Ingreso</a></td>
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