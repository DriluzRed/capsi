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
            'descripcion' => 'required|string|max:15|min:2'
        ],
        [
            'descripcion.required' => __('El campo descripcion es requerido'),
            'descripcion.string' => __('El campo descripcion debe ser un texto'),
            'descripcion.max' => __('El campo descripcion debe tener máximo 15 caracteres'),
            'descripcion.min' => __('El campo descripcion debe tener mínimo 2 caracteres')
        ]);

        $profesion = new Profesion();
        $profesion::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('profesiones.index');
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
            'descripcion' => 'required|string|max:15|min:2'
        ],
        [
            'descripcion.required' => __('El campo descripcion es requerido'),
            'descripcion.string' => __('El campo descripcion debe ser un texto'),
            'descripcion.max' => __('El campo descripcion debe tener máximo 15 caracteres'),
            'descripcion.min' => __('El campo descripcion debe tener mínimo 2 caracteres')
        ]);

        $profesion->update(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('profesiones.index');
    }

    public function destroy(Profesion $profesion)
    {
        $profesion->delete();
        return redirect()->route('profesiones.index');
    }
}
