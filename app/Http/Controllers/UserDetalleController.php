<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetalle;
use App\Models\Departamento;
use App\Models\Ciudad;
use App\Models\Profesion;
use App\Models\SituacionLaboral;
use App\Models\NivelEscolar;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserDetalleController extends Controller
{
    public function index()
    {
        if(auth()->user()->es_paciente == 1){
            $user_detalles = UserDetalle::where('user_id', auth()->user()->id)->get();
        }
        $users = User::where('es_paciente', 1)->get()->pluck('id');
        $users_ids = $users->toArray(); 
        $user_detalles = UserDetalle::whereIn('user_id', $users_ids)->get();
        return view('users_detalles.index');
        // ->with('user_detalles', $user_detalles);
    }

    public function createPaciente()
    {
        $departamentos = Departamento::where('deleted_at', null)->get();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();

        
        return view('users_detalles.create_paciente')
            ->with('departamentos', $departamentos)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises);
    }

    public function createPsicologo(){
        $departamentos = Departamento::where('deleted_at', null)->get();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();

        
        return view('users_detalles.create_psicologo')
            ->with('departamentos', $departamentos)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises);
    }

    public function show($id){
        if(auth()->user()->es_paciente == 1){
            $user_detalles = UserDetalle::where('user_id', auth()->user()->id)->get();
            return view('users_detalles.show')
                ->with('user_detalle', $user_detalles->first());
        }
        $user_detalle = UserDetalle::find($id);
        return view('users_detalles.show')
            ->with('user_detalle', $user_detalle);

    }


    public function update($id, Request $request)
    {
        $user_detalle = UserDetalle::find($id);
        $user_detalle->fill($request->all());
        $user_detalle->save();
        return redirect()->route('users_detalles.show', $user_detalle->id);
    }
}
