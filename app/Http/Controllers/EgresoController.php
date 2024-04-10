<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egreso;
class EgresoController extends Controller
{
    public function index()
    {
        $egresos = Egreso::where('deleted_at', null)->get();
        return view('egresos.index')
        ->with('egresos', $egresos)
        ->with('title', 'Listado de Egresos');
    }

    public function create()
    {
        return view('egresos.create')
        ->with('title', 'Crear egreso');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:15|min:2'
        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres')
        ]);

        $egreso = new Egreso();
        $egreso::create(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('egresos.index');
    }

    public function show(Egreso $egreso)
    {
        return view('egresos.show')
        ->with('egreso', $egreso)
        ->with('title', 'Ver egreso');
    }

    public function edit($id)
    {   
        $egreso = Egreso::find($id);
        return view('egresos.edit')
        ->with('egreso', $egreso)
        ->with('title', 'Editar egreso');
    }

    public function update(Request $request, Egreso $egreso)
    {
        $request->validate([
            'nombre' => 'required|string|max:15|min:2'
        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres')
        ]);

        $egreso->update(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('egresos.index');
    }

    public function destroy(Egreso $egreso)
    {
        $egreso->delete();
        return redirect()->route('egresos.index');
    }

}
