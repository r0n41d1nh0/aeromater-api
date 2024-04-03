@extends('layouts.report')
@section('content')
    <h5 align="center">LISTA DE SALIDAS</h5>
    <h6 align="center">DESDE {{ $desde }} HASTA {{ $hasta }}</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-condensed table-sm">
            <thead>
                <tr class="table-secondary">
                    <th>FECHA</th>
                    <th>M/C</th>
                    <th>DUA</th>
                    <th>GUIA</th>
                    <th>EMPRESA</th>
                    <th>BULTOS</th>
                    <th>PESO</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos as $dato)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($dato->K_FECHA)) }}</td>
                    <td>{{ $dato->K_MANIFIESTO }}</td>
                    <td>{{ $dato->K_DUA }}</td>
                    <td>{{ $dato->K_GUIA }}</td>
                    <td>{{ $dato->K_EMPRESA }}</td>
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