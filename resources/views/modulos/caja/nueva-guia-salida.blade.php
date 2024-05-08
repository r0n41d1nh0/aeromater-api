@extends('layouts.main')
@section('content.css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item "><a href="{{ route('caja') }}">Caja</a></li>
        <li class="breadcrumb-item ">Nueva Guía de Salida</li>
    </ol>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <p class="lead">Guía de Salida</p>
    <form action="{{ route('caja.registrar_dua') }}" method="post">
        @csrf
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Número de guía</label>
            <div class="col-md-2">
                <input type="text" name="numero_guia" id="numero_guia" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha y hora</label>
            <div class="col-md-2">
                <input type="text" name="fecha" id="fecha" value="" class="form-control form-control-sm" >
            </div>
            <div class="col-md-2">
                <input type="text" name="hora" id="hora" value="" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">DUA</label>
            <div class="col-md-4">
                <input type="text" name="dua" id="dua" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Régimen</label>
            <div class="col-md-2">
                <input type="text" name="regimen" id="regimen" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Manifiesto</label>
            <div class="col-md-1">
                <input type="text" name="tipo" id="tipo" class="form-control form-control-sm" autocomplete="off" readonly>
            </div>
            <div class="col-md-1">
                <input type="text" name="anio" id="anio" value="{{ date('Y') }}" class="form-control form-control-sm" autocomplete="off">
            </div>
            <div class="col-2">
                <input type="text" name="numero" id="numero" class="form-control form-control-sm" autocomplete="off">
            </div>
            <div class="col-1">
                <input type="button" id="btn_consultar" class="btn btn-secondary btn-sm" value="Consultar" >
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Carta Porte</label>
            <div class="col-md-4">
                <input type="text" name="cp" id="cp" class="form-control form-control-sm" autocomplete="off">
                <input type="hidden" name="id_cp" id="id_cp">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">RUC</label>
            <div class="col-md-4">
                <input type="text" name="ruc" id="ruc" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Consignatario</label>
            <div class="col-md-6">
                <input type="text" name="consignatario" id="consignatario" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">FOB</label>
            <div class="col-md-2">
                <input type="text" name="fob" id="fob" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">CIF</label>
            <div class="col-md-2">
                <input type="text" name="cif" id="cif" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Mercaderia</label>
            <div class="col-md-6">
                <textarea class="form-control form-control-sm" id="mercaderia" name='mercaderia' rows="3" autocomplete="off"></textarea>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Bultos</label>
            <div class="col-md-2">
                <input type="text" name="bultos" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Peso</label>
            <div class="col-md-2">
                <input type="text" name="peso" class="form-control form-control-sm" >
            </div>
        </div>
        <hr>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Empresa de Transporte</label>
            <div class="col-md-6">
                <input type="text" name="empresa_transporte" id="empresa_transporte" class="form-control form-control-sm" >
            </div>
            <div class="col-1">
                <input type="button" id="btn_chofer" class="btn btn-secondary btn-sm" value="Adicionar Chofer" >
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-sm" id="tabla_chofer" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Chofer</th>
                    <th scope="col">Nro Bultos</th>
                    <th scope="col">Guia Remisión</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Agencia</label>
            <div class="col-md-4">
                <input type="text" name="agencia" id="agencia" class="form-control form-control-sm" data-provide="typeahead" autocomplete="off">
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary btn-sm" value="Guardar"> <a href="{{ route('caja.listar_dua') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>

    <div class="modal fade" id="listaManifiesto" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Consulta manifiesto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Manifiesto</th>
                                <th>ID CP</th>
                                <th>CP</th>
                                <th>RUC</th>
                                <th>Consignatario</th>
                                <th>Mercaderia</th>
                                <th>Bultos</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_manifiestos">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Salir</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('content.js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.js') }}"></script>
    <script>
        $('#fecha').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

        $('#hora').inputmask( "hh:mm:ss", {
            placeholder: "HH:MM:SS", 
            insertMode: false, 
            showMaskOnHover: false,
            hourFormat: "24"
        });

        $(document).ready(function() {
            $("#btn_consultar").click(function() {
                var v_anio=$("#anio").val();
                var v_numero=$("#numero").val();
                var regex = /^[0-9]{3,}$/;
                if (regex.test(v_numero)){
                    $("#tbl_manifiestos").empty();

                    
                    var v_url ='{{ route("manifiestos.consulta",[":anio",":numero"]) }}';
                    v_url = v_url.replace(':anio', v_anio);
                    v_url = v_url.replace(':numero', v_numero);

                    $.get(v_url, function(data, status){
                        data.forEach(function(manifiesto) {
                            var nuevaFila = "<tr>" +
                                "<td>" + manifiesto.CODIGO_ADUMANIFIESTO + "</td>" +
                                "<td>" + manifiesto.ID_ADUCARTAPORTE + "</td>" +
                                "<td>" + manifiesto.CODIGO_ADUCARTAPORTE + "</td>" +
                                "<td>" + manifiesto.RUC_EXTEMPRESA + "</td>" +
                                "<td>" + decodeURIComponent(escape(manifiesto.RAZON_EXTEMPRESA)) + "</td>" +
                                "<td>" + decodeURIComponent(escape(manifiesto.DESCMERCADERIA_ADUCARTAPORTE)) + "</td>" +
                                "<td>" + manifiesto.NROBULTOS_ADUCARTAPORTE + "</td>" +
                            "</tr>";
                            $("#tbl_manifiestos").append(nuevaFila);
                        });
                        $("#listaManifiesto").modal('show');
                    });
                } else {
                    alert("Ingrese por lo menos 3 dígitos");
                }

            });

            $("#dataTable tbody").on("click", "tr", function() {
                var columnas = $(this).find("td");
                
                var arr_manifiesto = $(columnas[0]).text().split('-');
                $("#tipo").val(arr_manifiesto[0]);
                $("#numero").val(arr_manifiesto[2]);
                $("#id_cp").val($(columnas[1]).text());
                $("#cp").val($(columnas[2]).text());
                $("#ruc").val($(columnas[3]).text());
                $("#consignatario").val($(columnas[4]).text());
                $("#mercaderia").val($(columnas[5]).text());
                $('#listaManifiesto').modal('hide');
                $("#agencia").focus();
            });

            var agencias = {!! json_encode($agencias) !!}
            $('#agencia').typeahead({
                source: agencias
            });

            $("#btn_chofer").click(function() {
                var nueva_fila = "<tr><td><input type='text' name='placa_chofer[]' class='form-control form-control-sm'></td><td><input type='text' name='chofer[]' class='form-control form-control-sm'></td><td><input type='text' name='bultos_chofer[]' class='form-control form-control-sm'></td><td><input type='text' name='guia_chofer[]' class='form-control form-control-sm'></td></tr>";
                $("#tabla_chofer tbody").append(nueva_fila);
            });
            
        });
    </script>
@endsection