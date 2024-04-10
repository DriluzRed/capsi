<?php

namespace App\Http\Controllers;
use App\Models\DetalleEspecialidad;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class DetalleEspecialidadController extends Controller
{
    public function index()
    {
        $detalleEspecialidades = DetalleEspecialidad::where('deleted_at', null)->get();
        return view('detalleEspecialidades.index')
        ->with('detalleEspecialidades', $detalleEspecialidades)
        ->with('title', 'Listado de Detalle Especialidades');
    }

    public function create()
    {
        $especialidades = Especialidad::where('deleted_at', null)->get();
        return view('detalleEspecialidades.create')
        ->with('title', 'Crear Detalle de Especialidades');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'especialidad' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.max' => 'El campo nombre debe tener máximo 30 caracteres',
            'especialidad.required' => 'El campo país es obligatorio'
        ]
        );
        $detalleEspecialidad = new DetalleEspecialidad();
        $detalleEspecialidad->nombre = $request->nombre;
        $detalleEspecialidad->especialidad_id = $request->especialidad;
        $detalleEspecialidad->save();
        return redirect()->route('detalleEspecialidades.index');
    }

    public function show(DetalleEspecialidad $detalleEspecialidad)
    {
        return view('detalleEspecialidades.show')
        ->with('detalleEspecialidad', $detalleEspecialidad)
        ->with('title', 'Detalle de detalleEspecialidad');
    }

    public function edit($id)
    {
        $detalleEspecialidad = DetalleEspecialidad::find($id);
        $especialidades = Especialidad::where('deleted_at', null)->get();
        return view('detalleEspecialidades.edit')
        ->with('detalleEspecialidad', $detalleEspecialidad)
        ->with('title', 'Editar detalleEspecialidad')
        ->with('especialidades', $especialidades);
    }

    public function update(Request $request, DetalleEspecialidad $detalleEspecialidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'especialidad' => 'required'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.max' => 'El campo nombre debe tener máximo 30 caracteres',
            'especialidad.required' => 'El campo país es obligatorio'
        ]
        );
        $detalleEspecialidad->nombre = $request->nombre;
        $detalleEspecialidad->especialidad_id = $request->especialidad;
        $detalleEspecialidad->save();
        return redirect()->route('detalleEspecialidades.index');
    }

    public function destroy(DetalleEspecialidad $detalleEspecialidad)
    {
        $detalleEspecialidad->delete();
        return redirect()->route('detalleEspecialidades.index');
    }

}
