<?php

namespace App\Http\Controllers;
use App\Models\Profesion;
use Illuminate\Http\Request;

class ProfesionController extends Controller
{
    public function index()
    {
        $profesiones = Profesion::where('deleted_at', null)->get();
        return view('pages.profesiones.index')
        ->with('profesiones', $profesiones)
        ->with('title', 'Listado de profesiones');
    }

    public function create()
    {
        return view('pages.profesiones.create')
        ->with('title', 'Crear profesion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ],
        [
            'descripcion.required' => 'El campo descripción es obligatorio',
        ]);

        $profesion = new Profesion();
        $profesion::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('profesiones.index')->with('mensaje', 'Se registró exitosamente');
    
    }

    public function show(Profesion $profesion)
    {
        return view('pages.profesiones.show')
        ->with('profesion', $profesion)
        ->with('title', 'Ver profesion');
    }

    public function edit($id)
    {   
        $profesion = Profesion::find($id);
        return view('pages.profesiones.edit')
        ->with('profesion', $profesion)
        ->with('title', 'Editar profesion');
    }

    public function update(Request $request, Profesion $profesion)
    {
        $request->validate([
            'descripcion' => 'required'
        ],
        [
            'descripcion.required' => 'El campo descripción es obligatorio',
        ]);

        $profesion->update(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('profesiones.index')->with('mensaje', 'Se actualizó correctamente');
    }

    public function destroy(Profesion $profesion)
    {
        $profesion->delete();
        return redirect()->route('profesiones.index')->with('mensaje', 'Se eliminó correctamente');
    }
}
