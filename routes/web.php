<?php

use GuzzleHttp\Middleware;
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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/paises', [App\Http\Controllers\PaisController::class, 'index'])->middleware('auth')->name('paises.index');
Route::get('/paises/create', [App\Http\Controllers\PaisController::class, 'create'])->middleware('auth')->name('paises.create');
Route::post('/paises', [App\Http\Controllers\PaisController::class, 'store'])->middleware('auth')->name('paises.store');
Route::get('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'show'])->middleware('auth')->name('paises.show');
Route::get('/paises/{pais}/edit', [App\Http\Controllers\PaisController::class, 'edit'])->middleware('auth')->name('paises.edit');
Route::put('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'update'])->middleware('auth')->name('paises.update');
Route::delete('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'destroy'])->middleware('auth')->name('paises.destroy');


Route::get('/departamentos', [App\Http\Controllers\DepartamentoController::class, 'index'])->middleware('auth')->name('departamentos.index');
Route::get('/departamentos/create', [App\Http\Controllers\DepartamentoController::class, 'create'])->middleware('auth')->name('departamentos.create');
Route::post('/departamentos', [App\Http\Controllers\DepartamentoController::class, 'store'])->middleware('auth')->name('departamentos.store');
Route::get('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'show'])->middleware('auth')->name('departamentos.show');
Route::get('/departamentos/{departamento}/edit', [App\Http\Controllers\DepartamentoController::class, 'edit'])->middleware('auth')->name('departamentos.edit');
Route::put('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'update'])->middleware('auth')->name('departamentos.update');
Route::delete('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'destroy'])->middleware('auth')->name('departamentos.destroy');


Route::get('/ciudad', [App\Http\Controllers\CiudadController::class, 'index'])->middleware('auth')->name('ciudad.index');
Route::get('/ciudad/create', [App\Http\Controllers\CiudadController::class, 'create'])->middleware('auth')->name('ciudad.create');
Route::post('/ciudad', [App\Http\Controllers\CiudadController::class, 'store'])->middleware('auth')->name('ciudad.store');
Route::get('/ciudad/{ciudad}', [App\Http\Controllers\CiudadController::class, 'show'])->middleware('auth')->name('ciudad.show');
Route::get('/ciudad/{ciudad}/edit', [App\Http\Controllers\CiudadController::class, 'edit'])->middleware('auth')->name('ciudad.edit');
Route::put('/ciudad/{ciudad}', [App\Http\Controllers\CiudadController::class, 'update'])->middleware('auth')->name('ciudad.update');
Route::delete('/ciudad/{ciudad}', [App\Http\Controllers\CiudadController::class, 'destroy'])->middleware('auth')->name('ciudad.destroy');

Route::get('/egresos', [App\Http\Controllers\EgresoController::class, 'index'])->middleware('auth')->name('egresos.index');
Route::get('/egresos/create', [App\Http\Controllers\EgresoController::class, 'create'])->middleware('auth')->name('egresos.create');
Route::post('/egresos', [App\Http\Controllers\EgresoController::class, 'store'])->middleware('auth')->name('egresos.store');
Route::get('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'show'])->middleware('auth')->name('egresos.show');
Route::get('/egresos/{egreso}/edit', [App\Http\Controllers\EgresoController::class, 'edit'])->middleware('auth')->name('egresos.edit');
Route::put('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'update'])->middleware('auth')->name('egresos.update');
Route::delete('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'destroy'])->middleware('auth')->name('egresos.destroy');

Route::get('/ingresos', [App\Http\Controllers\IngresoController::class, 'index'])->middleware('auth')->name('ingresos.index');
Route::get('/ingresos/create', [App\Http\Controllers\IngresoController::class, 'create'])->middleware('auth')->name('ingresos.create');
Route::post('/ingresos', [App\Http\Controllers\IngresoController::class, 'store'])->middleware('auth')->name('ingresos.store');
Route::get('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'show'])->middleware('auth')->name('ingresos.show');
Route::get('/ingresos/{ingreso}/edit', [App\Http\Controllers\IngresoController::class, 'edit'])->middleware('auth')->name('ingresos.edit');
Route::put('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'update'])->middleware('auth')->name('ingresos.update');
Route::delete('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'destroy'])->middleware('auth')->name('ingresos.destroy');

Route::get('/profesiones', [App\Http\Controllers\ProfesionController::class, 'index'])->middleware('auth')->name('profesiones.index');
Route::get('/profesiones/create', [App\Http\Controllers\ProfesionController::class, 'create'])->middleware('auth')->name('profesiones.create');
Route::post('/profesiones', [App\Http\Controllers\ProfesionController::class, 'store'])->middleware('auth')->name('profesiones.store');
Route::get('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'show'])->middleware('auth')->name('profesiones.show');
Route::get('/profesiones/{profesion}/edit', [App\Http\Controllers\ProfesionController::class, 'edit'])->middleware('auth')->name('profesiones.edit');
Route::put('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'update'])->middleware('auth')->name('profesiones.update');
Route::delete('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'destroy'])->middleware('auth')->name('profesiones.destroy');

Route::get('/nivelEscolar', [App\Http\Controllers\NivelEscolarController::class, 'index'])->middleware('auth')->name('nivelEscolar.index');
Route::get('/nivelEscolar/create', [App\Http\Controllers\NivelEscolarController::class, 'create'])->middleware('auth')->name('nivelEscolar.create');
Route::post('/nivelEscolar', [App\Http\Controllers\NivelEscolarController::class, 'store'])->middleware('auth')->name('nivelEscolar.store');
Route::get('/nivelEscolar/{nivelEscolar}', [App\Http\Controllers\NivelEscolarController::class, 'show'])->middleware('auth')->name('nivelEscolar.show');
Route::get('/nivelEscolar/{nivelEscolar}/edit', [App\Http\Controllers\NivelEscolarController::class, 'edit'])->middleware('auth')->name('nivelEscolar.edit');
Route::put('/nivelEscolar/{nivelEscolar}', [App\Http\Controllers\NivelEscolarController::class, 'update'])->middleware('auth')->name('nivelEscolar.update');
Route::delete('/nivelEscolar/{nivelEscolar}', [App\Http\Controllers\NivelEscolarController::class, 'destroy'])->middleware('auth')->name('nivelEscolar.destroy');

Route::get('/situacionLaboral', [App\Http\Controllers\SituacionLaboralController::class, 'index'])->middleware('auth')->name('situacionLaboral.index');
Route::get('/situacionLaboral/create', [App\Http\Controllers\SituacionLaboralController::class, 'create'])->middleware('auth')->name('situacionLaboral.create');
Route::post('/situacionLaboral', [App\Http\Controllers\SituacionLaboralController::class, 'store'])->middleware('auth')->name('situacionLaboral.store');
Route::get('/situacionLaboral/{situacionLaboral}', [App\Http\Controllers\SituacionLaboralController::class, 'show'])->middleware('auth')->name('situacionLaboral.show');
Route::get('/situacionLaboral/{situacionLaboral}/edit', [App\Http\Controllers\SituacionLaboralController::class, 'edit'])->middleware('auth')->name('situacionLaboral.edit');
Route::put('/situacionLaboral/{situacionLaboral}', [App\Http\Controllers\SituacionLaboralController::class, 'update'])->middleware('auth')->name('situacionLaboral.update');
Route::delete('/situacionLaboral/{situacionLaboral}', [App\Http\Controllers\SituacionLaboralController::class, 'destroy'])->middleware('auth')->name('situacionLaboral.destroy');

Route::get('/especialidades', [App\Http\Controllers\EspecialidadController::class, 'index'])->middleware('auth')->name('especialidades.index');
Route::get('/especialidades/create', [App\Http\Controllers\EspecialidadController::class, 'create'])->middleware('auth')->name('especialidades.create');
Route::post('/especialidades', [App\Http\Controllers\EspecialidadController::class, 'store'])->middleware('auth')->name('especialidades.store');
Route::get('/especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'show'])->middleware('auth')->name('especialidades.show');
Route::get('/especialidades/{especialidad}/edit', [App\Http\Controllers\EspecialidadController::class, 'edit'])->middleware('auth')->name('especialidades.edit');
Route::put('/especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'update'])->middleware('auth')->name('especialidades.update');
Route::delete('/especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'destroy'])->middleware('auth')->name('especialidades.destroy');

Route::get('/detalleEspecialidades', [App\Http\Controllers\DetalleEspecialidadController::class, 'index'])->middleware('auth')->name('detalleEspecialidades.index');
Route::get('/detalleEspecialidades/create', [App\Http\Controllers\DetalleEspecialidadController::class, 'create'])->middleware('auth')->name('detalleEspecialidades.create');
Route::post('/detalleEspecialidades', [App\Http\Controllers\DetalleEspecialidadController::class, 'store'])->middleware('auth')->name('detalleEspecialidades.store');
Route::get('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'show'])->middleware('auth')->name('detalleEspecialidades.show');
Route::get('/detalleEspecialidades/{detalleEspecialidad}/edit', [App\Http\Controllers\DetalleEspecialidadController::class, 'edit'])->middleware('auth')->name('detalleEspecialidades.edit');
Route::put('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'update'])->middleware('auth')->name('detalleEspecialidades.update');
Route::delete('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'destroy'])->middleware('auth')->name('detalleEspecialidades.destroy');

Route::get('/detalleEspecialidades', [App\Http\Controllers\DetalleEspecialidadController::class, 'index'])->middleware('auth')->name('detalleEspecialidades.index');
Route::get('/detalleEspecialidades/create', [App\Http\Controllers\DetalleEspecialidadController::class, 'create'])->middleware('auth')->name('detalleEspecialidades.create');
Route::post('/detalleEspecialidades', [App\Http\Controllers\DetalleEspecialidadController::class, 'store'])->middleware('auth')->name('detalleEspecialidades.store');
Route::get('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'show'])->middleware('auth')->name('detalleEspecialidades.show');
Route::get('/detalleEspecialidades/{detalleEspecialidad}/edit', [App\Http\Controllers\DetalleEspecialidadController::class, 'edit'])->middleware('auth')->name('detalleEspecialidades.edit');
Route::put('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'update'])->middleware('auth')->name('detalleEspecialidades.update');
Route::delete('/detalleEspecialidades/{detalleEspecialidad}', [App\Http\Controllers\DetalleEspecialidadController::class, 'destroy'])->middleware('auth')->name('detalleEspecialidades.destroy');

Route::get('/turnos', [App\Http\Controllers\TurnoController::class, 'index'])->middleware('auth')->name('turnos.index');
Route::get('/turnos/create', [App\Http\Controllers\TurnoController::class, 'create'])->middleware('auth')->name('turnos.create');
Route::post('/turnos', [App\Http\Controllers\TurnoController::class, 'store'])->middleware('auth')->name('turnos.store');
Route::get('/turnos/{turno}', [App\Http\Controllers\TurnoController::class, 'show'])->middleware('auth')->name('turnos.show');
Route::get('/turnos/{turno}/edit', [App\Http\Controllers\TurnoController::class, 'edit'])->middleware('auth')->name('turnos.edit');
Route::put('/turnos/{turno}', [App\Http\Controllers\TurnoController::class, 'update'])->middleware('auth')->name('turnos.update');
Route::delete('/turnos/{turno}', [App\Http\Controllers\TurnoController::class, 'destroy'])->middleware('auth')->name('turnos.destroy');