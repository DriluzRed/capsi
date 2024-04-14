<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')
            ->with('users', $users);
    }

    public function create()
    {
        $roles = Role::all();
        $permssions = Permission::all();
        return view('admin.users.create')
            ->with('roles', $roles)
            ->with('permissions', $permssions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->nombre_profesional = $request->nombre_profesional;
        $usuario->password = bcrypt($request->password);
        $usuario->es_pacietne = $request->es_paciente;
        $usuario->assignRole($request->roles);
        $usuario->givePermissionTo($request->permissions);
        $usuario->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Rol creado con éxito');
    }

    public function show(User $usuario)
    {
        return view('admin.users.show', compact('usuario'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('permissions', $permissions);
    }

    public function update(Request $request, $id)
{
    $usuario = User::find($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required',
    ]);

    $usuario->name = $request->name;
    $usuario->email = $request->email;
    if ($request->filled('password')) {
        $request->validate([
            'password' => 'required',
        ]);
        $usuario->password = bcrypt($request->password);
    }
    $usuario->save();

    // Obtener los nombres de los roles y permisos
    if($request->roles) {
        $roles = Role::whereIn('id', $request->roles)->pluck('name');
        $usuario->syncRoles($roles);
    }
    if($request->permissions) {
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
        $usuario->syncPermissions($permissions);
    }

    return redirect()->route('admin.users.index');
}

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.users.index');
    }

}
