<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::where('deleted_at', null)->get();
        return view('pages.ciudad.index')
        ->with('ciudades', $ciudades)
        ->with('title', 'Listado de Ciudad');
    }
    public function create()
    {
        $departamentos = Departamento::where('deleted_at', null)->get();
        return view('pages.ciudad.create')
        ->with('title', 'Crear Ciudad')
        ->with('departamentos', $departamentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'departamento_id' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'departamento_id.required' => 'El campo departamento es obligatorio'
        ]
        );
        $ciudad = new Ciudad();
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento_id;
        $ciudad->save();
        return redirect()->route('ciudades.index');
    }

    public function show(Ciudad $ciudad)
    {
        return view('ciudads.show')
        ->with('ciudad', $ciudad)
        ->with('title', 'Detalle de ciudad');
    }

    public function edit($id)
    {
        $ciudad = Ciudad::find($id);
        $departamentos = Departamento::where('deleted_at', null)->get();
        return view('pages.ciudad.edit')
        ->with('ciudad', $ciudad)
        ->with('title', 'Editar ciudad')
        ->with('departamentos', $departamentos);
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
            'nombre' => 'required',
            'departamento_id' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'departamento_id.required' => 'El campo departamento es obligatorio'
        ]
        );
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento_id;
        $ciudad->save();
        return redirect()->route('ciudades.index');
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return redirect()->route('ciudades.index');
    }

}
