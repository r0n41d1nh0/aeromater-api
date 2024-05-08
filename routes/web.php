<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\ManifiestosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('modulos.inicio');
})->middleware(['auth', 'verified'])->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ingresos-personal/listar', [IngresosController::class,'listar'])->name('ingresos');
    Route::get('/ingresos-personal/nuevo', [IngresosController::class,'nuevo'])->name('ingresos.nuevo');
    Route::post('/ingresos-personal/guardar',[IngresosController::class,'registrarIngreso'])->name('ingresos.guardar');
    Route::get('/ingresos-personal/persona/{id_persona}/fecha-ingreso/{fecha_ingreso}/hora-ingreso/{hora_ingreso}',[IngresosController::class,'editar'])->name('ingresos.editar');
    Route::post('/ingresos-personal/actualizar',[IngresosController::class,'actualizarIngreso'])->name('ingresos.actualizar');
    Route::post('/ingresos-personal/borrar',[IngresosController::class,'borrarIngreso'])->name('ingresos.borrar');

    Route::get('/personas/consultar-por-documento/tipo/{tipo_documento}/numero/{numero}', [PersonasController::class,'consultaPersona'])->name('personas.consulta');

    Route::get('/empresas/consultar-por-ruc/{ruc}', [EmpresasController::class,'consultaEmpresa'])->name('empresas.consulta');
    Route::get('/empresas/buscar-agencia', [EmpresasController::class,'buscarAgencia'])->name('empresas.buscar_agencia');

    Route::get('/reportes', [PaginasController::class,'reportes'])->name('reportes');
    Route::get('/reportes/salida-diaria', [ReportesController::class,'salidaDiaria'])->name('reportes.salida_diaria');
    Route::get('/reportes/reporte-salida-diaria', [ReportesController::class,'reporteSalidaDiaria'])->name('reportes.reporte_salida_diaria');
    Route::get('/reportes/manifiesto', [ReportesController::class,'manifiesto'])->name('reportes.manifiesto');
    Route::get('/reportes/reporte-manifiesto/{manifiesto}', [ReportesController::class,'reporteManifiesto'])->name('reportes.reporte_manifiesto');
    Route::get('/reportes/ingresos', [ReportesController::class,'ingresos'])->name('reportes.ingresos');
    Route::get('/reportes/reporte-ingresos', [ReportesController::class,'reporteIngresos'])->name('reportes.reporte_ingresos');
    Route::get('/reportes/movimiento-consignatario', [ReportesController::class,'movimientoConsignatario'])->name('reportes.movimiento_consignatario');
    Route::get('/reportes/reporte-movimiento-consignatario', [ReportesController::class,'reporteMovimientoConsignatario'])->name('reportes.reporte_movimiento_consignatario');

    Route::get('/caja', [PaginasController::class,'caja'])->name('caja');
    Route::get('/caja/listar-dua', [CajaController::class,'listarDua'])->name('caja.listar_dua');
    Route::get('/caja/nueva-dua', [CajaController::class,'nuevaDua'])->name('caja.nueva_dua');
    Route::post('/caja/registrar-dua', [CajaController::class,'registrarDua'])->name('caja.registrar_dua');
    Route::get('/caja/dua/{dua}', [CajaController::class,'editarDua'])->name('caja.editar_dua');
    Route::post('/caja/actualizar-dua', [CajaController::class,'actualizarDua'])->name('caja.actualizar_dua');
    Route::get('/caja/nueva-guia-salida', [CajaController::class,'nuevaGuiaSalida'])->name('caja.nueva_guia_salida');

    Route::get('/manifiestos/consultar/anio/{anio}/numero/{numero}', [ManifiestosController::class,'consultaManifiesto'])->name('manifiestos.consulta');

});

require __DIR__.'/auth.php';
