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
            'descripcion' => 'required',
            'fecha' => 'required',
            'monto' => 'required',
        ],
        [
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'fecha.required' => 'El campo fecha es obligatorio',
            'monto.required' => 'El monto es obligatorio',
        ]);
        $fecha = date('Y-m-d', strtotime($request->fecha));
        $egreso = new Egreso();
        $egreso->descripcion = $request->descripcion;
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
            'descripcion' => 'required',
            'fecha' => 'required',
            'monto' => 'required',
        ],
        [
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'fecha.required' => 'El campo fecha es obligatorio',
            'monto.required' => 'El monto es obligatorio',
        ]);

        $fecha = date('Y-m-d', strtotime($request->fecha));
        $egreso->descripcion = $request->descripcion;
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
