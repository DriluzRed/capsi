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
            $this->miFicha(auth()->user()->id);
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

    public function update($id, Request $request)
    {
        $user_detalle = UserDetalle::find($id);
        $user_detalle->fill($request->all());
        $user_detalle->save();
        return redirect()->route('users_detalles.show', $user_detalle->id);
    }

    public function miFicha(){
        $id = auth()->user()->id;
        $paciente = User::where('id', $id)->first();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();
        $departamentos = Departamento::where('deleted_at', null)->get();

        return view('pages.pacientes.mi-ficha')
            ->with('paciente', $paciente)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises)
            ->with('departamentos', $departamentos);

    }

    public function createMiFicha(){
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();
        $departamentos = Departamento::where('deleted_at', null)->get();

        return view('pages.pacientes.create-mi-ficha')
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises)
            ->with('departamentos', $departamentos);
    }

    public function getPacientes(){
        $pacientes = User::where('es_paciente', 1)->get();
        return view('pages.pacientes.index')
            ->with('pacientes', $pacientes);
    }
}
