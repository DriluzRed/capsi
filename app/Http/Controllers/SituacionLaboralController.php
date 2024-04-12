<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SituacionLaboral;

class SituacionLaboralController extends Controller
{
    public function index()
    {
        $situacionLaboral = SituacionLaboral::where('deleted_at', null)->get();
        return view('situacionLaboral.index')
        ->with('situacionLaboral', $situacionLaboral)
        ->with('title', 'Listado de  Situacion Laboral');
    }

    public function create()
    {
        return view('situacionLaboral.create')
        ->with('title', 'Crear Situacion Laboral');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:15|min:2'
        ],
        [
            'descripcion.required' => __('El campo descripcion es requerido'),
            'descripcion.string' => __('El campo descripcion debe ser un texto'),
            'descripcion.max' => __('El campo descripcion debe tener máximo 15 caracteres'),
            'descripcion.min' => __('El campo descripcion debe tener mínimo 2 caracteres')
        ]);

        $situacionLaboral = new SituacionLaboral();
        $situacionLaboral::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('situacionLaboral.index');
    }

    public function show(SituacionLaboral $situacionLaboral)
    {
        return view('situacionLaboral.show')
        ->with('situacionLaboral', $situacionLaboral)
        ->with('title', 'Ver situacionLaboral');
    }

    public function edit($id)
    {   
        $situacionLaboral = SituacionLaboral::find($id);
        return view('situacionLaboral.edit')
        ->with('situacionLaboral', $situacionLaboral)
        ->with('title', 'Editar situacionLaboral');
    }

    public function update(Request $request, SituacionLaboral $situacionLaboral)
    {
        $request->validate([
            'descripcion' => 'required|string|max:15|min:2'
        ],
        [
            'descripcion.required' => __('El campo descripcion es requerido'),
            'descripcion.string' => __('El campo descripcion debe ser un texto'),
            'descripcion.max' => __('El campo descripcion debe tener máximo 15 caracteres'),
            'descripcion.min' => __('El campo descripcion debe tener mínimo 2 caracteres')
        ]);

        $situacionLaboral->update(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('situacionLaboral.index');
    }

    public function destroy(SituacionLaboral $situacionLaboral)
    {
        $situacionLaboral->delete();
        return redirect()->route('situacionLaboral.index');
    }
}
