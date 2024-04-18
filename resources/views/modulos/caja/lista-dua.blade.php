@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('caja') }}">Caja</a>
        </li>
        <li class="breadcrumb-item ">DUA</li>
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
    <p class="lead">Buscar DUA</p>
    <form action="{{ route('caja.listar_dua') }}" method="get">
        <div class="row g-3 align-items-center">
            <label class="col-md-2 col-form-label">DUA</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" name="anio" value="{{ date('Y') }}" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="dua" class="form-control form-control-sm" autocomplete="off"> 
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary btn-sm" name="btnBuscar" value="Buscar"> <a href="{{ route('caja.nueva_dua') }}" class="btn btn-primary btn-sm">Nuevo</a>  <a href="{{ route('caja') }}" class="btn btn-primary btn-sm">Salir</a>
    </form>
    <br>
    @if(count($duas) > 0 )
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>DUA</th>
                    <th>Manifiesto</th>
                    <th>Carta Porte</th>
                    <th>Empresa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($duas as $dua)
                <tr>
                    <td>{{ $dua->CODIGO_ADUDUA }}</td>
                    <td>{{ $dua->CODIGO_ADUMANIFIESTO }}</td>
                    <td>{{ $dua->CODIGO_ADUCARTAPORTE }}</td>
                    <td>{{ utf8_decode($dua->RAZON_EXTEMPRESA) }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $duas->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    @endif
@endsection