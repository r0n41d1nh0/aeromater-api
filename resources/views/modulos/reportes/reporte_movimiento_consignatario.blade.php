@extends('layouts.report')
@section('content')
    <h5 align="center">Reporte de movimientos de mercaderia por cliente</h5>
    <h6 align="center">DESDE {{ $desde }} HASTA {{ $hasta }}</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-borderless table-condensed table-sm">
            <thead class="text-center">
                <tr>
                    <th width="50%" colspan="5">Ingreso</th>
                    <th width="50%" colspan="4">Salida</th>
                </tr>
                <tr>
                    <th width="5%">M/C</th>
                    <th>D. Trans</th>
                    <th width="10%">Consignatario</th>
                    <th class="20%">Mercaderia</th>
                    <th width="10%">Recepcion</th>
                    <th>DUA</th>
                    <th>Doc. Transporte</th>
                    <th>Placa</th>
                    <th>Chofer</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos as $dato)
                <tr>
                    <td colspan="9"><u><b>{{ $dato[0] }}</b></u> Fecha: {{ date('d/m/Y', strtotime($dato[1])) }} Hora: {{ $dato[2] }}</td>
                </tr>
                @foreach($dato[4] as $cartas)
                    <tr>
                        <td rowspan="{{ sizeof($cartas[7])*2+2 }}"></td>
                        <td rowspan="{{ sizeof($cartas[7])*2+2 }}">{{ $cartas[1] }}</td>
                        <td rowspan="{{ sizeof($cartas[7])*2+2 }}">{{ utf8_decode($cartas[2]) }}</td>
                        <td rowspan="{{ sizeof($cartas[7])*2+2 }}">{{ utf8_decode($cartas[3]) }}</td>
                        <td rowspan="{{ sizeof($cartas[7])*2+2 }}">Cant.: {{ $cartas[4] }} {{ $dato[3] }}<br>Peso: {{ number_format($cartas[5],2,'.','') }} Kg.</td>
                    </tr>
                    @foreach($cartas[7] as $dua)
                        <tr>
                            <td colspan="4">{{ $dua[0] }}</b></u> Fecha: {{ date('d/m/Y', strtotime($dua[1])) }} Hora: {{ $dua[2] }}
                                <br>Guia: {{ $dua[3] }}
                                <br>Cant.: {{ $dua[4] }} Peso: {{ number_format($dua[5],2,'.','') }} Kg.
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ $dua[7] }}</td>
                            <td>{{ utf8_decode($dua[6]) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        @if($cartas[4] !=  $cartas[6])
                        <td colspan="4"><p class="text-danger">La cantidad ingresada ({{$cartas[4]}} Kg.) con la de salida total ({{ $cartas[6] }} Kg.) son distintas.</p></td>
                        @else
                        <td colspan="4"></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection