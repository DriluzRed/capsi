<?php

namespace App\Http\Controllers;
use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::where('deleted_at', null)->get();
        return view('turnos.index')
        ->with('turnos', $turnos)
        ->with('title', 'Listado de Turnos');
    }

    public function create()
    {
        return view('turnos.create')
        ->with('title', 'Crear Turno');
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

        $turno = new Turno();
        $turno::create(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('turnos.index');
    }

    public function show(Turno $turno)
    {
        return view('turnos.show')
        ->with('turno', $turno)
        ->with('title', 'Ver Turno');
    }

    public function edit($id)
    {   
        $turno = Turno::find($id);
        return view('turnos.edit')
        ->with('turno', $turno)
        ->with('title', 'Editar Turno');
    }

    public function update(Request $request, Turno $turno)
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

        $turno->update(
            [
                'descripcion' => $request->descripcion
            ]
        );
        return redirect()->route('turnos.index');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index');
    }
}
