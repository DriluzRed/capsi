<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index');
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $permiso = new Permission();
        $permiso->name = $request->nombre;
        $permiso->description = $request->descripcion;
        $permiso->save();

        return redirect()->route('permissions.index');
    }

    public function show(Permission $permiso)
    {
        return view('permissions.show', compact('permiso'));
    }

    public function edit(Permission $permiso)
    {
        return view('permissions.edit', compact('permiso'));
    }

    public function update(Request $request, Permission $permiso)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $permiso->name = $request->nombre;
        $permiso->description = $request->descripcion;
        $permiso->save();

        return redirect()->route('permissions.index');
    }


    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return redirect()->route('permissions.index');
    }
}
