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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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


Route::get('/ciudades', [App\Http\Controllers\CiudadController::class, 'index'])->middleware('auth')->name('ciudades.index');
Route::get('/ciudades/create', [App\Http\Controllers\CiudadController::class, 'create'])->middleware('auth')->name('ciudades.create');
Route::post('/ciudades', [App\Http\Controllers\CiudadController::class, 'store'])->middleware('auth')->name('ciudades.store');
Route::get('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'show'])->middleware('auth')->name('ciudades.show');
Route::get('/ciudades/{ciudad}/edit', [App\Http\Controllers\CiudadController::class, 'edit'])->middleware('auth')->name('ciudades.edit');
Route::put('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'update'])->middleware('auth')->name('ciudades.update');
Route::delete('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'destroy'])->middleware('auth')->name('ciudades.destroy');


Route::get('/users_detalles', [App\Http\Controllers\UserDetalleController::class, 'index'])->middleware('auth')->name('users_detalles.index');
Route::get('/users_detalles/create_pac', [App\Http\Controllers\UserDetalleController::class, 'createPaciente'])->middleware('auth')->name('users_detalles.create_pac');
Route::get('/users_detalles/create_psi', [App\Http\Controllers\UserDetalleController::class, 'createPsicologo'])->middleware('auth')->name('users_detalles.create_psi');
Route::post('/users_detalles', [App\Http\Controllers\UserDetalleController::class, 'store'])->middleware('auth')->name('users_detalles.store');

Route::get('/users_detalles/{user_detalle}', [App\Http\Controllers\UserDetalleController::class, 'show'])->middleware('auth')->name('users_detalles.show');
Route::get('/users_detalles/{user_detalle}/edit', [App\Http\Controllers\UserDetalleController::class, 'edit'])->middleware('auth')->name('users_detalles.edit');
Route::put('/users_detalles/{user_detalle}', [App\Http\Controllers\UserDetalleController::class, 'update'])->middleware('auth')->name('users_detalles.update');
Route::delete('/users_detalles/{user_detalle}', [App\Http\Controllers\UserDetalleController::class, 'destroy'])->middleware('auth')->name('users_detalles.destroy');


Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('admin.users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->middleware('auth')->name('admin.users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->middleware('auth')->name('admin.users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('admin.users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth')->name('admin.users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->middleware('auth')->name('admin.users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('auth')->name('admin.users.destroy');

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth')->name('admin.roles.index');
Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->middleware('auth')->name('admin.roles.create');
Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->middleware('auth')->name('admin.roles.store');
Route::get('/roles/{role}', [App\Http\Controllers\RoleController::class, 'show'])->middleware('auth')->name('admin.roles.show');
Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('auth')->name('admin.roles.edit');
Route::put('/roles/{role}', [App\Http\Controllers\RoleController::class, 'update'])->middleware('auth')->name('admin.roles.update');
Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('auth')->name('admin.roles.destroy');

Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->middleware('auth')->name('admin.permissions.index');
Route::get('/permissions/create', [App\Http\Controllers\PermissionController::class, 'create'])->middleware('auth')->name('admin.permissions.create');
Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->middleware('auth')->name('admin.permissions.store');
Route::get('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'show'])->middleware('auth')->name('admin.permissions.show');
Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->middleware('auth')->name('admin.permissions.edit');
Route::put('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'update'])->middleware('auth')->name('admin.permissions.update');
Route::delete('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->middleware('auth')->name('admin.permissions.destroy');

Route::get('/ingresos', [App\Http\Controllers\IngresosController::class, 'index'])->middleware('auth')->name('ingresos.index');
Route::get('/ingresos/create', [App\Http\Controllers\IngresosController::class, 'create'])->middleware('auth')->name('ingresos.create');
Route::post('/ingresos', [App\Http\Controllers\IngresosController::class, 'store'])->middleware('auth')->name('ingresos.store');
Route::get('/ingresos/{ingreso}', [App\Http\Controllers\IngresosController::class, 'show'])->middleware('auth')->name('ingresos.show');
Route::get('/ingresos/{ingreso}/edit', [App\Http\Controllers\IngresosController::class, 'edit'])->middleware('auth')->name('ingresos.edit');
Route::put('/ingresos/{ingreso}', [App\Http\Controllers\IngresosController::class, 'update'])->middleware('auth')->name('ingresos.update');
Route::delete('/ingresos/{ingreso}', [App\Http\Controllers\IngresosController::class, 'destroy'])->middleware('auth')->name('ingresos.destroy');

Route::get('/egresos', [App\Http\Controllers\EgresosController::class, 'index'])->middleware('auth')->name('egresos.index');
Route::get('/egresos/create', [App\Http\Controllers\EgresosController::class, 'create'])->middleware('auth')->name('egresos.create');
Route::post('/egresos', [App\Http\Controllers\EgresosController::class, 'store'])->middleware('auth')->name('egresos.store');
Route::get('/egresos/{egreso}', [App\Http\Controllers\EgresosController::class, 'show'])->middleware('auth')->name('egresos.show');
Route::get('/egresos/{egreso}/edit', [App\Http\Controllers\EgresosController::class, 'edit'])->middleware('auth')->name('egresos.edit');
Route::put('/egresos/{egreso}', [App\Http\Controllers\EgresosController::class, 'update'])->middleware('auth')->name('egresos.update');
Route::delete('/egresos/{egreso}', [App\Http\Controllers\EgresosController::class, 'destroy'])->middleware('auth')->name('egresos.destroy');

Route::get('/pacientes', [App\Http\Controllers\UserDetalleController::class, 'getPacientes'])->middleware('auth')->name('pacientes.index');
Route::get('/pacientes_by_psico', [App\Http\Controllers\UserDetalleController::class, 'createPsicologo'])->middleware('auth')->name('pacientes.create_psico');
Route::get('/pacientes/edit/{id}', [App\Http\Controllers\UserDetalleController::class, 'editPaciente'])->middleware('auth')->name('pacientes.edit');
Route::get('/pacientes/{id}/show', [App\Http\Controllers\UserDetalleController::class, 'showPaciente'])->middleware('auth')->name('pacientes.show');
Route::put('/pacientes/{id}', [App\Http\Controllers\UserDetalleController::class, 'update'])->middleware('auth')->name('pacientes.update');
Route::delete('/pacientes/{id}', [App\Http\Controllers\UserDetalleController::class, 'destroyPaciente'])->middleware('auth')->name('pacientes.destroy');

Route::get('/pacientes_by_paciente', [App\Http\Controllers\UserDetalleController::class, 'createPacienteByPaciente'])->middleware('auth')->name('pacientes.create_paciente');
Route::get('/pacientes/mi-ficha', [App\Http\Controllers\UserDetalleController::class, 'miFicha'])->middleware('auth')->name('pacientes.mi-ficha');
Route::get('/pacientes/mi-ficha-create', [App\Http\Controllers\UserDetalleController::class, 'createMiFicha'])->middleware('auth')->name('pacientes.mi-ficha-create');
Route::post('/pacientes', [App\Http\Controllers\UserDetalleController::class, 'store'])->middleware('auth')->name('pacientes.store');
Route::get('/pacientes/seguimiento/{id}', [App\Http\Controllers\UserDetalleController::class, 'edit'])->middleware('auth')->name('pacientes.seguimiento');

Route::get('/agenda', [App\Http\Controllers\AgendaController::class, 'index'])->middleware('auth')->name('agenda.index');
Route::get('/agenda/events', [App\Http\Controllers\AgendaController::class, 'events'])->middleware('auth')->name('agenda.events');
Route::get('/agenda/solicitar-turno', [App\Http\Controllers\AgendaController::class, 'solicitarTurno'])->middleware('auth')->name('agenda.solicitar-turno');
Route::post('/agenda', [App\Http\Controllers\AgendaController::class, 'store'])->middleware('auth')->name('agenda.store');
Route::get('/agenda/cancelarTurno/{id}', [App\Http\Controllers\AgendaController::class, 'cancelarTurno'])->middleware('auth')->name('agenda.cancelarTurno');

Route::get('/especialidades', [App\Http\Controllers\EspecialidadController::class, 'index'])->middleware('auth')->name('especialidades.index');
Route::get('/especialidades/create', [App\Http\Controllers\EspecialidadController::class, 'create'])->middleware('auth')->name('especialidades.create');
Route::post('/especialidades', [App\Http\Controllers\EspecialidadController::class, 'store'])->middleware('auth')->name('especialidades.store');
Route::get('/especialidades/{especialidad}/edit', [App\Http\Controllers\EspecialidadController::class, 'edit'])->middleware('auth')->name('especialidades.edit');
Route::put('/especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'update'])->middleware('auth')->name('especialidades.update');
Route::delete('/especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'destroy'])->middleware('auth')->name('especialidades.destroy');

Route::get('/profesiones', [App\Http\Controllers\ProfesionController::class, 'index'])->middleware('auth')->name('profesiones.index');
Route::get('/profesiones/create', [App\Http\Controllers\ProfesionController::class, 'create'])->middleware('auth')->name('profesiones.create');
Route::post('/profesiones', [App\Http\Controllers\ProfesionController::class, 'store'])->middleware('auth')->name('profesiones.store');
Route::get('/profesiones/{profesion}/edit', [App\Http\Controllers\ProfesionController::class, 'edit'])->middleware('auth')->name('profesiones.edit');
Route::put('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'update'])->middleware('auth')->name('profesiones.update');
Route::delete('/profesiones/{profesion}', [App\Http\Controllers\ProfesionController::class, 'destroy'])->middleware('auth')->name('profesiones.destroy');

Route::get('/nivelEscolar', [App\Http\Controllers\NivelEscolarController::class, 'index'])->middleware('auth')->name('nivelEscolar.index');
Route::get('/nivelEscolar/create', [App\Http\Controllers\NivelEscolarController::class, 'create'])->middleware('auth')->name('nivelEscolar.create');
Route::post('/nivelEscolar', [App\Http\Controllers\NivelEscolarController::class, 'store'])->middleware('auth')->name('nivelEscolar.store');
Route::get('/nivelEscolar/{nivelEscolar}/edit', [App\Http\Controllers\NivelEscolarController::class, 'edit'])->middleware('auth')->name('nivelEscolar.edit');
Route::put('/nivelEscolar/{nivelEscolar}', [App\Http\Controllers\NivelEscolarController::class, 'update'])->middleware('auth')->name('nivelEscolar.update');
Route::delete('/nivelEscolar/{nivelEscolar}', [App\Http\Controllers\NivelEscolarController::class, 'destroy'])->middleware('auth')->name('nivelEscolar.destroy');

Route::get('/situacionLaboral', [App\Http\Controllers\SituacionLaboralController::class, 'index'])->middleware('auth')->name('situacionLaboral.index');
Route::get('/situacionLaboral/create', [App\Http\Controllers\SituacionLaboralController::class, 'create'])->middleware('auth')->name('situacionLaboral.create');
Route::post('/situacionLaboral', [App\Http\Controllers\SituacionLaboralController::class, 'store'])->middleware('auth')->name('situacionLaboral.store');
Route::get('/situacionLaboral/{situacionLaboral}/edit', [App\Http\Controllers\SituacionLaboralController::class, 'edit'])->middleware('auth')->name('situacionLaboral.edit');
Route::put('/situacionLaboral/{situacionLaboral}', [App\Http\Controllers\SituacionLaboralController::class, 'update'])->middleware('auth')->name('situacionLaboral.update');
Route::delete('/situacionLaboral/{situacionLaboral}', [App\Http\Controllers\SituacionLaboralController::class, 'destroy'])->middleware('auth')->name('situacionLaboral.destroy');


Route::get('/chat-ia', [App\Http\Controllers\OpenAIController::class, 'index'])->middleware('auth')->name('chat-ia.index');
Route::post('/send-message', [App\Http\Controllers\OpenAIController::class, 'sendMessage'])->middleware('auth')->name('send-message');

Route::get('/download-pdf/{id}', [App\Http\Controllers\PDFController::class, 'downloadPDF'])->name('download.pdf');

Route::post('/send-seguimiento', [App\Http\Controllers\UserDetalleController::class, 'sendSeguimiento'])->middleware('auth')->name('sendSeguimiento');
Route::get('/get-seguimientos', [App\Http\Controllers\UserDetalleController::class, 'getSeguimientos'])->middleware('auth')->name('getSeguimiento');
