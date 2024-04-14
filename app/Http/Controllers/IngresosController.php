<?php

namespace App\Http\Controllers;
use App\Models\Ingreso;

use Illuminate\Http\Request;

class IngresosController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::where('deleted_at', null)->get();
        return view('pages.ingresos.index')
        ->with('ingresos', $ingresos)
        ->with('title', 'Listado de ingresos');
    }

    public function create()
    {
        return view('ingresos.create')
        ->with('title', 'Crear ingreso');
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

        $ingreso = new Ingreso();
        $ingreso::create(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('ingresos.index');
    }

    public function show(Ingreso $ingreso)
    {
        return view('ingresos.show')
        ->with('ingreso', $ingreso)
        ->with('title', 'Ver ingreso');
    }

    public function edit($id)
    {   
        $ingreso = Ingreso::find($id);
        return view('ingresos.edit')
        ->with('ingreso', $ingreso)
        ->with('title', 'Editar ingreso');
    }

    public function update(Request $request, Ingreso $ingreso)
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

        $ingreso->update(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('ingresos.index');
    }

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index');
    }

}
