@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item ">Reportes</li>
    </ol>
    <ul>
        <li>Balanza
            <ul>
                <li><a href="{{ route('reportes.salida_diaria') }}">Salidas entre fechas</a></li>
                <li><a href="{{ route('reportes.manifiesto') }}">Consulta de manifiesto</a></li>
            </ul>
        </li>
        
        <li>Reportes
            <ul>
                <li><a href="">Ingreso de mercaderia entre fechas</a></li>
                <li><a href="">Movimiento de mercaderia por consignatario</a></li>
            </ul>
        </li>
        <li><a href="{{ route('inicio') }}">Salir</a></li>
    </ul>
@endsection