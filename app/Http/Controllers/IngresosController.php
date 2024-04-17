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
        return view('pages.ingresos.create')
        ->with('title', 'Crear ingreso');
    }

    public function store(Request $request)
    {

        $request->validate([

        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres'),
            'fecha.required' => 'El campo fecha es requerido',
        ]);
        $fecha = date('Y-m-d', strtotime($request->fecha));
        $ingreso = new Ingreso();
        $ingreso->descripcion = $request->nombre;
        $ingreso->fecha = $fecha;
        $ingreso->total = $request->monto;
        $ingreso->save();
        return redirect()->route('ingresos.index');
    }

    public function show(Ingreso $ingreso)
    {
        return view('pages.ingresos.show')
        ->with('ingreso', $ingreso)
        ->with('title', 'Ver ingreso');
    }

    public function edit($id)
    {   
        $ingreso = Ingreso::find($id);
        // dd($ingreso);
        return view('pages.ingresos.edit')
        ->with('ingreso', $ingreso)
        ->with('title', 'Editar ingreso');
    }

    public function update(Request $request, $id)
    {
        $ingreso = Ingreso::find($id);
        $request->validate([

        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres')
        ]);

        $fecha = date('Y-m-d', strtotime($request->fecha));
        $ingreso->descripcion = $request->nombre;
        $ingreso->fecha = $fecha;
        $ingreso->total = $request->monto;
        $ingreso->save();
        return redirect()->route('ingresos.index');
    }

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index');
    }

}
