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
        <li class="breadcrumb-item "><a href="{{ route('caja.listar_dua') }}">DUA</a></li>
        <li class="breadcrumb-item ">Nueva DUA</li>
    </ol>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <p class="lead">Nueva DUA</p>
    <form action="{{ route('caja.listar_dua') }}" method="post">
        @csrf
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
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <input type="text" name="manifiesto" id="manifiesto" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-secondary btn-sm" value="Consultar" onclick="buscar_persona()">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Carta Porte</label>
            <div class="col-md-4">
                <input type="text" name="cp" id="cp" class="form-control form-control-sm" autocomplete="off">
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
            <div class="col-md-4">
                <input type="text" name="consignatario" id="consignatario" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Agencia</label>
            <div class="col-md-4">
                <input type="text" name="agencia" id="agencia" class="form-control form-control-sm" autocomplete="off">
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
            <div class="col-md-4">
                <textarea class="form-control form-control-sm" name='mercaderia' rows="2" autocomplete="off"></textarea>
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
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha y hora de levante</label>
            <div class="col-md-2">
                <input type="text" name="fecha_levante" id="fecha_levante" value="" class="form-control form-control-sm" >
            </div>
            <div class="col-md-2">
                <input type="text" name="hora_levante" id="hora_levante" value="" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha y hora de salida</label>
            <div class="col-md-2">
                <input type="text" name="fecha_salida" id="fecha_salida" value="" class="form-control form-control-sm" >
            </div>
            <div class="col-md-2">
                <input type="text" name="hora_salida" id="hora_salida" value="" class="form-control form-control-sm" >
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary btn-sm" value="Guardar"> <a href="{{ route('caja.listar_dua') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
@endsection
@section('content.js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.js') }}"></script>
    <script>
        $('#fecha_levante').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

        $('#hora_levante').inputmask( "hh:mm:ss", {
            placeholder: "HH:MM:SS", 
            insertMode: false, 
            showMaskOnHover: false,
            hourFormat: "24"
        });

        $('#fecha_salida').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

        $('#hora_salida').inputmask( "hh:mm:ss", {
            placeholder: "HH:MM:SS", 
            insertMode: false, 
            showMaskOnHover: false,
            hourFormat: "24"
        });

        function buscar_persona(){
            v_numero=$("#numero_documento").val();
            v_tipo=$("#tipo_documento").val();
            
            if ($("#numero_documento").val().length == 0) {
                alert("Ingrese el numero de documento");
                return false;
            }

            v_url='{{ route("personas.consulta",[":v_tipo",":v_numero"]) }}';
            v_url = v_url.replace(':v_tipo', v_tipo);
            v_url = v_url.replace(':v_numero', v_numero);

            $.get(v_url, function(data, status){
                if(data) {
                    v_data=JSON.parse(data);
                    if (v_data["apellidoPaterno"]){
                        $("#nombres").val(v_data["nombres"] + " " + v_data["apellidoPaterno"] + " " + v_data["apellidoMaterno"]);   
                    } else {
                        $("#nombres").val(v_data["NOMBRESAPELLIDOS_GENPERSONA"]); 
                    }
                }
            });
        }
        
        function buscar_empresa(){
            
            v_ruc=$("#ruc").val();
            
            if ($("#ruc").val().length == 0) {
                alert("Ingrese el numero de ruc");
                return false;
            }

            v_url='{{ route("empresas.consulta",[":v_ruc"]) }}';
            v_url = v_url.replace(':v_ruc', v_ruc);

            $.get(v_url, function(data, status){
                if(data) {
                    v_data=JSON.parse(data);
                    if (v_data["razonSocial"]){
                        $("#razon_social").val(v_data["razonSocial"]);
                    } else {
                        $("#razon_social").val(v_data["RAZON_EXTEMPRESA"]);
                    }
                }
            });
        }
    </script>
@endsection