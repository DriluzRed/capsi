<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::where('deleted_at', null)->get();
        return view('pages.paises.index')
        ->with('paises', $paises)
        ->with('title', 'Listado de paises');
    }

    public function create()
    {
        return view('pages.paises.create')
        ->with('title', 'Crear pais');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre del país es obligatorio',
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
        return view('pages.paises.show')
        ->with('pais', $pais)
        ->with('title', 'Ver pais');
    }

    public function edit($id)
    {   
        $pais = Pais::find($id);
        return view('pages.paises.edit')
        ->with('pais', $pais)
        ->with('title', 'Editar pais');
    }

    public function update(Request $request, Pais $pais)
    {
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre del país es obligatorio',
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
