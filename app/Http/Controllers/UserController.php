<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Especialidad;
use App\Models\UserEspecialidad;

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
        $especialidades = Especialidad::all();
        return view('admin.users.create')
            ->with('roles', $roles)
            ->with('permissions', $permssions)
            ->with('especialidades', $especialidades);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'ci' => 'required',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->nombre_profesional = $request->nombre_profesional;
        $usuario->password = bcrypt($request->password);
        $usuario->es_paciente = $request->es_paciente;
        $usuario->ci = $request->ci;
        $usuario->rango_hora_start = $request->rango_hora_start;
        $usuario->rango_hora_end = $request->rango_hora_end;
        $usuario->save();
        if($request->roles){
            $roles = Role::whereIn('id', $request->roles)->pluck('name');
            $usuario->assignRole($roles);
        }
        if($request->permissions){
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
            $usuario->givePermissionTo($permissions);
        }
        $usuario->especialidades()->attach($request->especialidades);
        // $user_especialidades = new UserEspecialidad();
        // $user_especialidades->user_id = $usuario->id;
        // $user_especialidades->especialidad_id = $request->especialidades;
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
        $especialidades = Especialidad::all();
        return view('admin.users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('permissions', $permissions)
            ->with('especialidades', $especialidades);
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
    $usuario->ci = $request->ci;
    $usuario->nombre_profesional = $request->nombre_profesional;
    $usuario->es_paciente = $request->es_paciente;
    $usuario->rango_hora_start = $request->rango_hora_start;
    $usuario->rango_hora_end = $request->rango_hora_end;
    if ($request->filled('password')) {
        $request->validate([
            'password' => 'required',
        ]);
        $usuario->password = bcrypt($request->password);
    }
    $usuario->save();

    if($request->roles) {
        $roles = Role::whereIn('id', $request->roles)->pluck('name');
        $usuario->syncRoles($roles);
    }
    if($request->permissions) {
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
        $usuario->syncPermissions($permissions);
    }
    $usuario->especialidades()->detach();
    $usuario->especialidades()->attach($request->especialidades);

    return redirect()->route('admin.users.index');
}

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.users.index');
    }


}
