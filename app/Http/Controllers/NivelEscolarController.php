<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NivelEscolar;

class NivelEscolarController extends Controller
{
    public function index()
    {
        $nivelEscolar = NivelEscolar::where('deleted_at', null)->get();
        return view('pages.nivelEscolar.index')
        ->with('nivelEscolar', $nivelEscolar)
        ->with('title', 'Listado de  Nivel Escolar');
    }

    public function create()
    {
        return view('pages.nivelEscolar.create')
        ->with('title', 'Crear Nivel Escolar');
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

        $nivelEscolar = new NivelEscolar();
        $nivelEscolar::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('nivelEscolar.index');
    }

    
    public function edit($id)
    {   
        $nivelEscolar = NivelEscolar::find($id);
        return view('pages.nivelEscolar.edit')
        ->with('nivelEscolar', $nivelEscolar)
        ->with('title', 'Editar nivelEscolar');
    }

    public function update(Request $request, NivelEscolar $nivelEscolar)
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

        $nivelEscolar->update(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('nivelEscolar.index');
    }

    public function destroy(NivelEscolar $nivelEscolar)
    {
        $nivelEscolar->delete();
        return redirect()->route('nivelEscolar.index');
    }
}
