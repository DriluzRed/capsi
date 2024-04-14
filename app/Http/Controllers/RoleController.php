<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')
            ->with('roles', $roles);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create')
            ->with('permissions', $permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        
        $rol->save();

        $rol->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {   
        $rol = Role::find($id);
        $request->validate([
            'name' => 'required',
        ]);

        $rol->name = $request->name;
        $rol->save();
        $rol->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $rol)
    {
        $rol->delete();
        return redirect()->route('roles.index');
    }


}
