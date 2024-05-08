@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item ">Caja</li>
    </ol>
    <ul>
        <li>Guía de salida
            <ul>
                <li><a href="{{ route('caja.listar_dua') }}">DUA</a></li>
                <li><a href="{{ route('caja.nueva_guia_salida') }}">Guía de salida</a></li>
            </ul>
        </li>
        <li><a href="{{ route('inicio') }}">Salir</a></li>
    </ul>
@endsection