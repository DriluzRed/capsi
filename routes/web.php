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


Route::get('/ciudades', [App\Http\Controllers\CiudadController::class, 'index'])->middleware('auth')->name('ciudades.index');
Route::get('/ciudades/create', [App\Http\Controllers\CiudadController::class, 'create'])->middleware('auth')->name('ciudades.create');
Route::post('/ciudades', [App\Http\Controllers\CiudadController::class, 'store'])->middleware('auth')->name('ciudades.store');
Route::get('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'show'])->middleware('auth')->name('ciudades.show');
Route::get('/ciudades/{ciudad}/edit', [App\Http\Controllers\CiudadController::class, 'edit'])->middleware('auth')->name('ciudades.edit');
Route::put('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'update'])->middleware('auth')->name('ciudades.update');
Route::delete('/ciudades/{ciudad}', [App\Http\Controllers\CiudadController::class, 'destroy'])->middleware('auth')->name('ciudades.destroy');

Route::get('/egresos', [App\Http\Controllers\EgresoController::class, 'index'])->middleware('auth')->name('egresos.index');
Route::get('/egresos/create', [App\Http\Controllers\EgresoController::class, 'create'])->middleware('auth')->name('egresos.create');
Route::post('/egresos', [App\Http\Controllers\EgresoController::class, 'store'])->middleware('auth')->name('egresos.store');
Route::get('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'show'])->middleware('auth')->name('egresos.show');
Route::get('/egresos/{egreso}/edit', [App\Http\Controllers\EgresoController::class, 'edit'])->middleware('auth')->name('egresos.edit');
Route::put('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'update'])->middleware('auth')->name('egresos.update');
Route::delete('/egresos/{egreso}', [App\Http\Controllers\EgresoController::class, 'destroy'])->middleware('auth')->name('egresos.destroy');

// Route::get('/ingresos', [App\Http\Controllers\IngresoController::class, 'index'])->middleware('auth')->name('ingresos.index');
// Route::get('/ingresos/create', [App\Http\Controllers\IngresoController::class, 'create'])->middleware('auth')->name('ingresos.create');
// Route::post('/ingresos', [App\Http\Controllers\IngresoController::class, 'store'])->middleware('auth')->name('ingresos.store');
// Route::get('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'show'])->middleware('auth')->name('ingresos.show');

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
