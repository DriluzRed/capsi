<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudad = Ciudad::where('deleted_at', null)->get();
        return view('ciudad.index')
        ->with('ciudad', $ciudad)
        ->with('title', 'Listado de Ciudad');
    }
    public function create()
    {
        $departamentos = Departamento::where('deleted_at', null)->get();
        return view('ciudad.create')
        ->with('title', 'Crear Ciudad')
        ->with('departamentos', $departamentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'departamento' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.max' => 'El campo nombre debe tener máximo 30 caracteres',
            'departamento.required' => 'El campo país es obligatorio'
        ]
        );
        $ciudad = new Ciudad();
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento;
        $ciudad->save();
        return redirect()->route('ciudad.index');
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
        return view('ciudad.edit')
        ->with('ciudad', $ciudad)
        ->with('title', 'Editar ciudad')
        ->with('departamentos', $departamentos);
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'departamento' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.max' => 'El campo nombre debe tener máximo 30 caracteres',
            'departamento.required' => 'El campo país es obligatorio'
        ]
        );
        $ciudad->nombre = $request->nombre;
        $ciudad->departamento_id = $request->departamento;
        $ciudad->save();
        return redirect()->route('ciudad.index');
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return redirect()->route('ciudad.index');
    }

}
