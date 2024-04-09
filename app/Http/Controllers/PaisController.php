<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::where('deleted_at', null)->get();
        return view('paises.index')
        ->with('paises', $paises)
        ->with('title', 'Listado de paises');
    }

    public function create()
    {
        return view('paises.create')
        ->with('title', 'Crear pais');
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

        $pais = new Pais();
        $pais::create(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('paises.index');
    }

    public function show(Pais $pais)
    {
        return view('paises.show')
        ->with('pais', $pais)
        ->with('title', 'Ver pais');
    }

    public function edit($id)
    {   
        $pais = Pais::find($id);
        return view('paises.edit')
        ->with('pais', $pais)
        ->with('title', 'Editar pais');
    }

    public function update(Request $request, Pais $pais)
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

        $pais->update(
            [
                'nombre' => $request->nombre
            ]
        );
        return redirect()->route('paises.index');
    }

    public function destroy(Pais $pais)
    {
        $pais->delete();
        return redirect()->route('paises.index');
    }

}
