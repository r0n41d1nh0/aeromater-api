@extends('layouts.report')
@section('content')
    <h5 align="center">LISTA DE INGRESOS</h5>
    <h6 align="center">DESDE {{ $desde }} HASTA {{ $hasta }}</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-condensed table-sm">
            <thead>
                <tr class="table-secondary">
                    <th>Procedencia</th>
                    <th>Manifiesto</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Comitente</th>
                    <th>Bultos</th>
                    <th>Peso</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato->K_PROCEDENCIA }}</td>
                    <td>{{ $dato->K_MANIFIESTO }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->K_FECHAINGRESO)) }}</td>
                    <td>{{ substr(utf8_decode($dato->K_MERCADERIA),15,25) }}</td>
                    <td>{{ utf8_decode($dato->K_EMPRESA) }}</td>
                    <td>{{ $dato->K_BULTOS }}</td>
                    <td>{{ $dato->K_PESO }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <b>Total Salidas 	{{ count($datos) }}<br>
    NOTA: EX = EXPORTACIONES</b>
@endsection