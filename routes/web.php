<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\EmpresasController;
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
    //return view('dashboard');
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
    
});

require __DIR__.'/auth.php';
