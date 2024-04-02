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
        <li class="breadcrumb-item ">{{ $ingreso->NOMBRESAPELLIDOS_GENPERSONA }} - {{ date('d/m/Y', strtotime($ingreso->FECHAINGRESO)) }} {{ $ingreso->HORAINGRESO }}</li>
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
    <p class="lead">Editar ingreso de personal</p>
    <form action="{{ route('ingresos.actualizar') }}" id="frm_editar_ingreso" method="post">
        @csrf
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Tipo de Documento</label>
            <div class="col-md-4">
                <select name="tipo_documento" id="tipo_documento" class="form-control form-control-sm" disabled>
                    <option value="1" {{ $ingreso->TIPO_DOCUMENTO == "1" ? "selected" : "" }}>LT LIBRETA TRIBUTARIA</option>
                    <option value="2" {{ $ingreso->TIPO_DOCUMENTO == "2" ? "selected" : "" }}>LE LIBRETA ELECTORAL</option>
                    <option value="3" {{ $ingreso->TIPO_DOCUMENTO == "3" ? "selected" : "" }}>DNI DOC NACIONAL DE IDENTIDAD</option>
                    <option value="4" {{ $ingreso->TIPO_DOCUMENTO == "4" ? "selected" : "" }}>RUC REGISTRO UNICO DEL CONTRIBUYENTE</option>
                    <option value="5" {{ $ingreso->TIPO_DOCUMENTO == "5" ? "selected" : "" }}>CI CARNET DE IDENTIDAD POLICIAL</option>
                    <option value="6" {{ $ingreso->TIPO_DOCUMENTO == "6" ? "selected" : "" }}>PAS PASAPORTE</option>
                    <option value="7" {{ $ingreso->TIPO_DOCUMENTO == "7" ? "selected" : "" }}>CE. CARNET DE EXTRANJERIA</option>
                    <option value="8" {{ $ingreso->TIPO_DOCUMENTO == "8" ? "selected" : "" }}>ORGANIZACIONES INTERNACIONALES</option>
                    <option value="9" {{ $ingreso->TIPO_DOCUMENTO == "9" ? "selected" : "" }}>SALVOCONDUCTO</option>
                </select>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Número</label>
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                        <input type="text" name="numero_documento" id="numero_documento" class="form-control form-control-sm" value="{{ $ingreso->DNI_GENPERSONA }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Nombres</label>
            <div class="col-md-4">
                <input type="text" name="nombres" id="nombres" class="form-control form-control-sm" value="{{ $ingreso->NOMBRESAPELLIDOS_GENPERSONA }}" disabled>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Condición</label>
            <div class="col-md-4">
                <select name="condicion" class="form-control form-control-sm">
                    <option value="1" {{ $ingreso->CONDICION== "1" ? "selected" : "" }}>Empleado</option>
                    <option value="2" {{ $ingreso->CONDICION== "2" ? "selected" : "" }}>Visitante</option>
                    <option value="3" {{ $ingreso->CONDICION== "3" ? "selected" : "" }}>Autoridad</option>
                    <option value="4" {{ $ingreso->CONDICION== "4" ? "selected" : "" }}>Usuario</option>
                    <option value="5" {{ $ingreso->CONDICION== "5" ? "selected" : "" }}>Contratista</option>
                    <option value="6" {{ $ingreso->CONDICION== "6" ? "selected" : "" }}>Despachador</option>
                    <option value="7" {{ $ingreso->CONDICION== "7" ? "selected" : "" }}>Chofer</option>
                    <option value="8" {{ $ingreso->CONDICION== "8" ? "selected" : "" }}>Otros</option>
                </select>
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Motivo</label>
            <div class="col-md-4">
                <input type="text" name="motivo" class="form-control form-control-sm" value="{{ $ingreso->MOTIVO }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Doc. Aduanero Asoc.</label>
            <div class="col-md-4">
                <input type="text" name="documento_adu_asoc" class="form-control form-control-sm" value="{{ $ingreso->DOCUMENTO_ADU_ASOC }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha de ingreso</label>
            <div class="col-md-2">
                <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control form-control-sm" value="{{ date('d/m/Y', strtotime($ingreso->FECHAINGRESO)) }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Hora de ingreso</label>
            <div class="col-md-2">
                <input type="text" name="hora_ingreso" id="hora_ingreso" class="form-control form-control-sm" value="{{ date('H:i:s', strtotime($ingreso->HORAINGRESO)) }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Fecha de salida</label>
            <div class="col-md-2">
                <input type="text" name="fecha_salida" id="fecha_salida" class="form-control form-control-sm" value="{{ isset($ingreso->FECHASALIDA) ? date('d/m/Y', strtotime($ingreso->FECHASALIDA)) : date('d/m/Y') }}" autocomplete="off">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">Hora de salida</label>
            <div class="col-md-2">
                <input type="text" name="hora_salida" id="hora_salida" class="form-control form-control-sm" value="{{ isset($ingreso->HORASALIDA) ? date('H:i:s', strtotime($ingreso->HORASALIDA)) : date('H:i:s') }}" autocomplete="off">
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">RUC de Empresa</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <input type="text" name="ruc" id="ruc" class="form-control form-control-sm" value="{{ $ingreso->RUC_EXTEMPRESA}}" autocomplete="off">
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
                <input type="text" name="razon_social" id="razon_social" class="form-control form-control-sm" value="{{ $ingreso->RAZON_EXTEMPRESA }}" autocomplete="off">
            </div>
        </div>
        <hr>
        <input type="hidden" name="id_genpersona" value="{{ $ingreso->ID_GENPERSONA }}">
        <input type="hidden" name="fecha_ingreso_original" value="{{ $ingreso->FECHAINGRESO }}">
        <input type="hidden" name="hora_ingreso_original" value="{{ $ingreso->HORAINGRESO }}">
    </form>
    <form action="{{ route('ingresos.borrar') }}" id="frm_borrar_ingreso" method="post">
        @csrf
        <input type="hidden" name="id_genpersona" value="{{ $ingreso->ID_GENPERSONA }}">
        <input type="hidden" name="fecha_ingreso" value="{{ $ingreso->FECHAINGRESO }}">
        <input type="hidden" name="hora_ingreso" value="{{ $ingreso->HORAINGRESO }}">
    </form>    
    <input type="submit" class="btn btn-primary btn-sm" value="Guardar" form="frm_editar_ingreso"> <input type="submit" class="btn btn-primary btn-sm" value="Borrar" onclick="return confirmSubmit()" form="frm_borrar_ingreso"> <a href="{{ route('ingresos') }}" class="btn btn-primary btn-sm">Salir</a>
    
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

        function confirmSubmit()
        {
            var agree=confirm("¿Tiene la seguridad de realizar esta acción?");
            if (agree)
                return true ;
            else
                return false ;
        }

    </script>
@endsection