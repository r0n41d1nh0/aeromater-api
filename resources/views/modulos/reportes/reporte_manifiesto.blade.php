@extends('layouts.report')
@section('content.css')
    <style>
        .table {
		    font-size: 14px;
		}
		.table td,th {
            padding: 0.25rem !important;
            vertical-align: middle !important;
		}
        .control-table {
            font-size: 13px;
        }
    </style>
@endsection
@section('content')
    <h6 align="center">Datos de Manifiesto {{ $manifiesto }}</h6>
    
    <div class="row">
        <div class=col-md-4>Procedencia</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PROCEDENCIA_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Manifiesto</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->CODIGO_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOS_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOS_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos manifestado</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSMANI_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos manifestado</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSMANI_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos faltantes</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSFALTA_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos faltantes</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSFALTA_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos sobrantes</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSSOBRA_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos sobrantes</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSSOBRA_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos en mal estado</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSMAL_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos en mal estado</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSMAL_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos abiertos</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSABIER_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos abiertos</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSABIER_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos con distintas marcas de seguridad</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSDIST_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos con distintas marcas de seguridad</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSDIST_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Nro de bultos violentados</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->NROBULTOSVIOL_ADUMANIFIESTO }}" disabled></div>
        <div class=col-md-4>Peso de bultos violentados</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->PESOBULTOSVIOL_ADUMANIFIESTO }}" disabled></div>
    </div>
    <div class="row">
        <div class=col-md-4>Manifiesto de referencia</div>
        <div class=col-md-2><input type="text" class="form-control form-control-sm" value="{{ $datos[0][0]->EXTRACCION_ADUMANIFIESTO }}" disabled></div>
    </div>
    <br>
    <h6 align="center">Datos de balanza - Ingreso</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-condensed table-bordered table-sm">
            <thead>
                <tr class="table-secondary">
                    <th>Placa</th>
                    <th>Fecha de ingreso</th>
                    <th>Fecha de salida</th>
                    <th>Peso bruto</th>
                    <th>Peso tara</th>
                    <th>Peso neto</th>
                    <th>Transportista</th>
                    <th>Chofer</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos[1] as $dato)
                <tr>
                    <td>{{ $dato->PLACA_BALBALANZA }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->FECHAINGRESO_BALBALANZA)) }} {{ $dato->HORAINGRESO_BALBALANZA }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->FECHASALIDA_BALBALANZA)) }} {{ $dato->HORASALIDA_BALBALANZA }}</td>
                    <td>{{ $dato->PESOBRUTO_BALBALANZA }}</td>
                    <td>{{ $dato->PESOTARA_BALBALANZA }}</td>
                    <td>{{ $dato->PESONETO_BALBALANZA }}</td>
                    <td>{{ utf8_decode($dato->RAZON_EXTEMPRESA) }}</td>
                    <td>{{ utf8_decode($dato->NOMBRESAPELLIDOS_GENPERSONA) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <h6 align="center">Datos de cartas porte</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-sm table-condensed table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>CP</th>
                    <th>Puerto</th>
                    <th>Consignatario</th>
                    <th>Mercaderia</th>
                    <th>Factura</th>
                    <th>Marca contenedor</th>
                    <th>Nro de bultos manifestado</th>
                    <th>Peso de bultos manifestado</th>
                    <th>Nro de bultos</th>
                    <th>Peso de bultos</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos[2] as $dato)
                <tr>
                    <td>{{ $dato->CODIGO_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->CODIGO_ADUPUERTO }}</td>
                    <td>{{ utf8_decode($dato->RAZON_EXTEMPRESA) }}</td>
                    <td>{{ utf8_decode($dato->DESCMERCADERIA_ADUCARTAPORTE) }}</td>
                    <td>{{ utf8_decode($dato->FACTURA_ADUCARTAPORTE) }}</td>
                    <td>{{ $dato->MARCACONTENEDOR_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->NROBULTOSMANI_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->PESOBULTOSMANI_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->NROBULTOS_ADUCARTAPORTE }}</td>
                    <td>{{ $dato->PESOBULTOS_ADUCARTAPORTE }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <h6 align="center">Datos de balanza - Salida</h6>
    <div class="table-responsive" >
        <table width="100%" class="table table-sm table-condensed table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>Placa</th>
                    <th>Fecha</th>
                    <th>Peso bruto</th>
                    <th>Peso tara</th>
                    <th>Peso neto</th>
                    <th>Transportista</th>
                    <th>Chofer</th>
                    <th>DUA</th>
                    <th>Prov. bultos</th>
                    <th>Bultos</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datos[3] as $dato)
                <tr>
                    <td>{{ $dato->K_PLACA }}</td>
                    <td>{{ date('d/m/Y', strtotime($dato->K_FECHA)) }} {{ $dato->K_HORA }}</td>
                    <td>{{ $dato->K_PESO_BRUTO }}</td>
                    <td>{{ $dato->K_PESO_TARA }}</td>
                    <td>{{ $dato->K_PESO }}</td>
                    <td>{{ utf8_decode($dato->K_EMPRESA) }}</td>
                    <td>{{ utf8_decode($dato->K_CHOFER) }}</td>
                    <td>{{ $dato->K_DUA }}</td>
                    <td>{{ $dato->K_BULTOS_PROV }}</td>
                    <td>{{ $dato->K_BULTOS }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection