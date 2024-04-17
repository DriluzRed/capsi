<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egreso;
class EgresosController extends Controller
{
    public function index()
    {
        $egresos = Egreso::where('deleted_at', null)->get();
        return view('pages.egresos.index')
        ->with('egresos', $egresos)
        ->with('title', 'Listado de Egresos');
    }

    public function create()
    {
        return view('pages.egresos.create')
        ->with('title', 'Crear egreso');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string'
        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres')
        ]);
        $fecha = date('Y-m-d', strtotime($request->fecha));
        $egreso = new Egreso();
        $egreso->descripcion = $request->nombre;
        $egreso->fecha = $fecha;
        $egreso->total = $request->monto;
        $egreso->save();
        return redirect()->route('egresos.index');
    }

    public function show(Egreso $egreso)
    {
        return view('pages.egresos.show')
        ->with('egreso', $egreso)
        ->with('title', 'Ver egreso');
    }

    public function edit($id)
    {   
        $egreso = Egreso::find($id);
        return view('pages.egresos.edit')
        ->with('egreso', $egreso)
        ->with('title', 'Editar egreso');
    }

    public function update(Request $request, $id)
    {
        $egreso = Egreso::find($id);
        $request->validate([
            'nombre' => 'required|string',
            
        ],
        [
            'nombre.required' => __('El campo nombre es requerido'),
            'nombre.string' => __('El campo nombre debe ser un texto'),
            'nombre.max' => __('El campo nombre debe tener máximo 15 caracteres'),
            'nombre.min' => __('El campo nombre debe tener mínimo 2 caracteres')
        ]);

        $fecha = date('Y-m-d', strtotime($request->fecha));
        $egreso->descripcion = $request->nombre;
        $egreso->fecha = $fecha;
        $egreso->total = $request->monto;
        $egreso->save();
        return redirect()->route('egresos.index');
    }

    public function destroy(Egreso $egreso)
    {
        $egreso->delete();
        return redirect()->route('egresos.index');
    }

}
