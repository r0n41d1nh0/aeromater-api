@extends('layouts.main')
@section('content')
    <h1 class="mt-5">Módulos</h1>
    <p class="lead">Bienvenido al Sistema de Administración de AEROMATER Elija una de las siguentes opciones:</p>
    <ul>
        <li><a href="{{ route('ingresos') }}">Ingresos</a></li>
        <li><a href="">Balanza</a></li>
        <li><a href="{{ route('caja') }}">Caja</a></li>
        <li><a href="">Archivo</a></li>
        <li><a href="{{ route('reportes') }}">Reportes</a></li>
        <!--<li><a href="modules/almacen/index.php">Almacen</a></li>
        <li><a href="modules/contabilidad/index.php">Contabilidad</a></li>
        <li><a href="modules/personal/index.php">Personal</a></li>
        <li><a href="modules/gerencia/index.php">Gerencia</a></li>
        <li><a href="modules/mantenimiento/index.php">Mantenimiento</a></li>
        <li><a href="modules/general/index.php">Configurar</a></li>
        <li><a href="modules/personal/modificarUsuario.php">Configuración Personal</a></li>
        -->
    </ul>
@endsection