<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SituacionLaboral;

class SituacionLaboralController extends Controller
{
    public function index()
    {
        $situacionLaboral = SituacionLaboral::where('deleted_at', null)->get();
        return view('pages.situacionLaboral.index')
        ->with('situacionLaboral', $situacionLaboral)
        ->with('title', 'Listado de  Situacion Laboral');
    }

    public function create()
    {
        return view('pages.situacionLaboral.create')
        ->with('title', 'Crear Situacion Laboral');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ],
        [
            'descripcion.required' => 'El campo descripción es obligatorio',
        ]);

        $situacionLaboral = new SituacionLaboral();
        $situacionLaboral::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('situacionLaboral.index');
    }

    
    public function edit($id)
    {   
        $situacionLaboral = SituacionLaboral::find($id);
        return view('pages.situacionLaboral.edit')
        ->with('situacionLaboral', $situacionLaboral)
        ->with('title', 'Editar situacionLaboral');
    }

    public function update(Request $request, SituacionLaboral $situacionLaboral)
    {
        $request->validate([
            'descripcion' => 'required'
        ],
        [
            'descripcion.required' => 'El campo descripción es obligatorio',
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
