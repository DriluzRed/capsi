<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return redirect()->route('users.index')
            ->with('success', 'Rol creado con éxito');
    }

    public function show(User $usuario)
    {
        return view('users.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        
        return view('users.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return redirect()->route('users.index');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('users.index');
    }

}
