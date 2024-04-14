<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index')
            ->with('permissions', $permissions);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $permiso = new Permission();
        $permiso->name = $request->name;
        $permiso->save();

        return redirect()->route('admin.permissions.index');
    }

    public function show(Permission $permiso)
    {
        return view('admin.permissions.show', compact('permiso'));
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permiso = Permission::find($id);
        $request->validate([
            'name' => 'required',
        ]);

        $permiso->name = $request->name;
        $permiso->save();

        return redirect()->route('admin.permissions.index');
    }


    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return redirect()->route('admin.permissions.index');
    }
}
