<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Pais;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::where('deleted_at', null)->get();
        return view('pages.departamentos.index')
        ->with('departamentos', $departamentos)
        ->with('title', 'Listado de Departamentos');
    }

    public function create()
    {
        $paises = Pais::where('deleted_at', null)->get();
        return view('pages.departamentos.create')
        ->with('title', 'Crear departamento')
        ->with('paises', $paises);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'pais' => 'required'
        ], [
            'nombre.required' => 'El nombre del departamento es obligatorio',
            'pais.required' => 'El campo país es obligatorio'
        ]
        );
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->pais_id = $request->pais;
        $departamento->save();
        return redirect()->route('departamentos.index')->with('mensaje', 'Se registró exitosamente');
    }

    public function show(Departamento $departamento)
    {
        return view('departamentos.show')
        ->with('departamento', $departamento)
        ->with('title', 'Detalle de departamento');
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $paises = Pais::where('deleted_at', null)->get();
        return view('pages.departamentos.edit')
        ->with('departamento', $departamento)
        ->with('title', 'Editar departamento')
        ->with('paises', $paises);
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required',
            'pais' => 'required'
        ], [
            'nombre.required' => 'El nombre del departamento es obligatorio',
            'pais.required' => 'El campo país es obligatorio'
        ]
        );
        $departamento->nombre = $request->nombre;
        $departamento->pais_id = $request->pais;
        $departamento->save();
        return redirect()->route('departamentos.index')->with('mensaje', 'Se actualizó correctamente');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('mensaje', 'Se eliminó correctamente');
    }

}
