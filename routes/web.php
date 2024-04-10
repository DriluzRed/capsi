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

