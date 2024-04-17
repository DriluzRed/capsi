<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::where('deleted_at', null)->get();
        return view('pages.especialidades.index')
        ->with('especialidades', $especialidades)
        ->with('title', 'Listado de especialidades');
    }

    public function create()
    {
        return view('pages.especialidades.create')
        ->with('title', 'Crear especialidad');
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

        $especialidad = new Especialidad();
        $especialidad::create(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('especialidades.index');
    }

    public function show(Especialidad $especialidad)
    {
        return view('especialidades.show')
        ->with('especialidad', $especialidad)
        ->with('title', 'Ver especialidad');
    }

    public function edit($id)
    {   
        $especialidad = Especialidad::find($id);
        return view('pages.especialidades.edit')
        ->with('especialidad', $especialidad)
        ->with('title', 'Editar especialidad');
    }

    public function update(Request $request, Especialidad $especialidad)
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

        $especialidad->update(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('especialidades.index');
    }

    public function destroy(Especialidad $especialidad)
    {
        $especialidad->delete();
        return redirect()->route('especialidades.index');
    }

}
