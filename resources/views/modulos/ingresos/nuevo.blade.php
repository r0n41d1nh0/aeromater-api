@extends('layouts.main')
@section('content.css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item "><a href="{{ route('ingresos') }}">Ingresos de personal</a></li>
        <li class="breadcrumb-item ">Nuevo ingreso de personal</li>
    </ol>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <p class="lead">Nuevo ingreso de personal</p>
    <form action="{{ route('ingresos.guardar') }}" method="post">
        @csrf
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Tipo de Documento</label>
            <div class="col-md-4">
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
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Número</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <input type="text" name="numero_documento" id="numero_documento" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-secondary btn-sm" value="Consultar" onclick="buscar_persona()">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Nombres</label>
            <div class="col-md-4">
                <input type="text" name="nombres" id="nombres" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Condición</label>
            <div class="col-md-4">
                <select name="condicion" class="form-control form-control-sm">
                    <option value="1" selected="">Empleado</option>
                    <option value="2">Visitante</option>
                    <option value="3">Autoridad</option>
                    <option value="4">Usuario</option>
                    <option value="5">Contratista</option>
                    <option value="6">Despachador</option>
                    <option value="7">Chofer</option>
                    <option value="8">Otros</option>
                </select>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Motivo</label>
            <div class="col-md-4">
                <input type="text" name="motivo" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Doc. Aduanero Asoc.</label>
            <div class="col-md-4">
                <input type="text" name="documento_adu_asoc" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha de ingreso</label>
            <div class="col-md-2">
                <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control form-control-sm" value="{{ date('d/m/Y') }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Hora de ingreso</label>
            <div class="col-md-2">
                <input type="text" name="hora_ingreso" id="hora_ingreso" class="form-control form-control-sm" value="{{ date('H:i:s') }}" autocomplete="off">
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">RUC de Empresa</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <input type="text" name="ruc" id="ruc" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-secondary btn-sm" value="Consultar" onclick="buscar_empresa()">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Razón social</label>
            <div class="col-md-4">
                <input type="text" name="razon_social" id="razon_social" class="form-control form-control-sm" autocomplete="off">
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary btn-sm" value="Guardar"> <a href="{{ route('ingresos') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
@endsection
@section('content.js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.js') }}"></script>
    <script>
        $('#fecha_ingreso').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            language: "es",
            todayHighlight: true
        });

        $('#hora_ingreso').inputmask( "hh:mm:ss", {
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