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
use Illuminate\Support\Facades\Validator;
use App\Models\Seguimiento;
use App\Models\Agenda;

class UserDetalleController extends Controller
{
    public function index()
    {
        if(auth()->user()->es_paciente == 1){

            $this->miFicha();
        }

        return view('users_detalles.index');
        //->with('user_detalles', $user_detalles);
    }

    //edit del lado del psico
    public function editPaciente($id){
        $paciente = User::where('id', $id)->first();
        $user_detalle = UserDetalle::where('user_id', $id)->first();
        $departamentos = Departamento::where('deleted_at', null)->get();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();
        return view('pages.pacientes.edit_paciente')
            ->with('paciente', $paciente)
            ->with('user_detalle', $user_detalle)
            ->with('departamentos', $departamentos)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises);
    }
    //crear del lado del psico
    public function createPsicologo(){
        $departamentos = Departamento::where('deleted_at', null)->get();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();

        
        return view('pages.pacientes.create')
            ->with('departamentos', $departamentos)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises);
    }

  

    //edit y show del lado del paciente
    public function miFicha($message = null){
        $user_id = auth()->user()->id;
        $ficha_exists = UserDetalle::where('user_id', $user_id)->first();
        if(!$ficha_exists){
            return $this->createMiFicha();
        }
        $paciente = User::where('id', $user_id)->first();
        $ciudades = Ciudad::where('deleted_at', null)->get();
        $profesiones = Profesion::where('deleted_at', null)->get();
        $situaciones_laborales = SituacionLaboral::where('deleted_at', null)->get();
        $escolaridades = NivelEscolar::where('deleted_at', null)->get();
        $paises = Pais::where('deleted_at', null)->get();
        $departamentos = Departamento::where('deleted_at', null)->get();
        if ($message) {
            return view('pages.pacientes.mi-ficha')
            ->with('paciente', $paciente)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises)
            ->with('departamentos', $departamentos)
            ->with('message', $message);
        }
        return view('pages.pacientes.mi-ficha')
            ->with('paciente', $paciente)
            ->with('ciudades', $ciudades)
            ->with('profesiones', $profesiones)
            ->with('situaciones_laborales', $situaciones_laborales)
            ->with('escolaridades', $escolaridades)
            ->with('paises', $paises)
            ->with('departamentos', $departamentos)
            ->with('message', '');
    }
    //crear del lado del paciente
    public function createMiFicha(){
        $user = auth()->user();
        $user_id = $user->id;
        $ficha_exists = UserDetalle::where('user_id', $user_id)->first();
        if($ficha_exists){
            return $this->miFicha('El usuario ya tiene una ficha.');
        }
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
            ->with('departamentos', $departamentos)
            ->with('user', $user);
    }
    //este es el nuevo index
    public function getPacientes(){
        $pacientes = User::where('es_paciente', 1)->get();
        return view('pages.pacientes.index')
            ->with('pacientes', $pacientes);
    }
    //show del lado del psico
    public function showPaciente($id){
        $paciente = User::where('id', $id)->first();
        
        return view('pages.pacientes.show')
            ->with('paciente', $paciente);
    }
    public function seguimiento($id){
        $paciente = User::where('id', $id)->first();
        return view('pages.pacientes.seguimiento')
            ->with('paciente', $paciente);
    }

    //store o save es para ambos
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'ci' => 'required|numeric',
            'telefono' => 'required|string|max:10',
            'nro_emergencia' => 'required|string|max:10',
            'motivo_consulta' => 'required',
        ], [
            'nombres.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'El apellido es obligatorio',
            'ci.required' => 'El documento de identidad es obligatorio', 
            'ci.numeric' => 'El documento de identidad solo debe contener números',
            'telefono.required' => 'El número de teléfono es obligatorio',
            'telefono.max' => 'El número de teléfono debe contener un máximo de 10 dígitos',
            'nro_emergencia.required' => 'El número de telefono de emergencia es obligatorio',
            'nro_emergencia.max' => 'El número de telefono de emergencia debe contener un máximo de 10 dígitos',
            'motivo_consulta.required' => 'El motivo de consulta es obligatorio',           

        ]
        );

        $user = User::where('ci', $request->ci)->first();
        $user_id = $user->id;
        $ficha = UserDetalle::where('user_id', $user_id)->first();
        if($ficha){
            $paciente = User::where('id', $user_id)->first();
            return redirect()->route('pacientes.show', $paciente->id)
            ->with('error', 'El usuario ya tiene una ficha.');
        }
        $user_detalle = new UserDetalle();
        $user_detalle->nombres = $request->nombres;
        $user_detalle->apellidos = $request->apellidos;
        $user_detalle->edad = $request->edad;
        $user_detalle->ci = $request->ci;
        $user_detalle->sexo = $request->sexo;
        $user_detalle->departamento_id = $request->departamento_id;
        $user_detalle->ciudad_id = $request->ciudad_id;
        $user_detalle->profesion_id = $request->profesion_id;
        $user_detalle->situacion_laboral_id = $request->situacion_laboral_id;
        $user_detalle->nivel_escolaridad_id = $request->nivel_escolar_id;
        $user_detalle->pais_id = $request->pais_id;
        $user_detalle->user_id = $user_id;
        $user_detalle->direccion = $request->direccion;
        $user_detalle->telefono = $request->telefono;
        $user_detalle->nombre_madre = $request->nombre_madre;
        $user_detalle->nombre_padre = $request->nombre_padre;
        $user_detalle->tiene_tutor = $request->tiene_tutor;
        $user_detalle->tutor = $request->nombre_tutor;
        $user_detalle->cant_hermanos = $request->cant_hermanos;
        $user_detalle->lugar_trabajo = $request->lugar_trabajo;
        $user_detalle->religion = $request->religion;
        $user_detalle->estado_civil = $request->estado_civil;
        $user_detalle->nro_emergencia = $request->nro_emergencia;
        $user_detalle->motivo_consutla = $request->motivo_consulta;
        $user_detalle->antecedentes_personales = $request->antecedentes_personales;
        $user_detalle->antecedentes_familiares = $request->antecedentes_familiares;
        $user_detalle->examen_medico = $request->examen_medico;
        $user_detalle->disimulacion = $request->disimulacion;
        $user_detalle->simulacion = $request->simulacion;
        $user_detalle->conciencia = $request->conciencia;
        $user_detalle->aspecto_del_paciente = $request->aspecto_del_paciente;
        $user_detalle->actitud = $request->actitud;
        $user_detalle->contacto_visual = $request->contacto_visual;
        $user_detalle->atencion_orientacion_temp_espa = $request->atencion_orientacion_temp_espa;
        $user_detalle->memoria = $request->memoria;
        $user_detalle->sensoperecepcion = $request->sensoperecepcion;
        $user_detalle->pensamiento = $request->pensamiento;
        $user_detalle->afectividad = $request->afectividad;
        $user_detalle->psicomotricidad = $request->psicomotricidad;
        $user_detalle->insigth = $request->insigth;
        $user_detalle->diagnostico_presuntivo = $request->diagnostico_presuntivo;
        $user_detalle->diagnostico_diferencial = $request->diagnostico_diferencial;
        $user_detalle->plan_tratamiento = $request->plan_tratamiento;
        $user_detalle->pronostico = $request->pronostico;
        $user_detalle->evolucion = $request->evolucion;
        $user_detalle->epicrisis = $request->epicrisis;
        $user_detalle->save();
        if(auth()->user()->es_paciente == 1){
            return redirect()->route('pacientes.mi-ficha');
        }
        return redirect()->route('pacientes.show', $user->id);
    }
    //update es para ambos
    public function update(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'ci' => 'required|numeric',
            'telefono' => 'required|string|max:10',
            'nro_emergencia' => 'required|string|max:10',
            'motivo_consulta' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'ci.required' => 'El documento de identidad es obligatorio', 
            'ci.numeric' => 'El documento de identidad solo debe contener números',
            'telefono.required' => 'El número de teléfono es obligatorio',
            'telefono.max' => 'El número de teléfono debe contener un máximo de 10 dígitos',
            'nro_emergencia.required' => 'El número de telefono de emergencia es obligatorio',
            'nro_emergencia.max' => 'El número de telefono de emergencia debe contener un máximo de 10 dígitos',
            'motivo_consulta.required' => 'El motivo de consulta es obligatorio',           

        ]
        );
        $user = User::where('ci', $request->ci)->first();

        $user_id = $user->id;
        $ficha = UserDetalle::where('user_id', $user_id)->first();
        $ficha->nombres = $request->nombres;
        $ficha->apellidos = $request->apellidos;
        $ficha->edad = $request->edad;
        $ficha->ci = $request->ci;
        $ficha->sexo = $request->sexo;
        $ficha->departamento_id = $request->departamento_id;
        $ficha->ciudad_id = $request->ciudad_id;
        $ficha->profesion_id = $request->profesion_id;
        $ficha->situacion_laboral_id = $request->situacion_laboral_id;
        $ficha->nivel_escolaridad_id = $request->nivel_escolar_id;
        $ficha->pais_id = $request->pais_id;
        $ficha->user_id = $user_id;
        $ficha->direccion = $request->direccion;
        $ficha->telefono = $request->telefono;
        $ficha->nombre_madre = $request->nombre_madre;
        $ficha->nombre_padre = $request->nombre_padre;
        $ficha->tiene_tutor = $request->tiene_tutor;
        $ficha->tutor = $request->nombre_tutor;
        $ficha->cant_hermanos = $request->cant_hermanos;
        $ficha->lugar_trabajo = $request->lugar_trabajo;
        $ficha->religion = $request->religion;
        $ficha->estado_civil = $request->estado_civil;
        $ficha->nro_emergencia = $request->nro_emergencia;
        $ficha->motivo_consutla = $request->motivo_consulta;
        $ficha->antecedentes_personales = $request->antecedentes_personales;
        $ficha->antecedentes_familiares = $request->antecedentes_familiares;
        $ficha->examen_medico = $request->examen_medico;
        $ficha->disimulacion = $request->disimulacion;
        $ficha->simulacion = $request->simulacion;
        $ficha->conciencia = $request->conciencia;
        $ficha->aspecto_del_paciente = $request->aspecto_del_paciente;
        $ficha->actitud = $request->actitud;
        $ficha->contacto_visual = $request->contacto_visual;
        $ficha->atencion_orientacion_temp_espa = $request->atencion_orientacion_temp_espa;
        $ficha->memoria = $request->memoria;
        $ficha->sensoperecepcion = $request->sensoperecepcion;
        $ficha->pensamiento = $request->pensamiento;
        $ficha->afectividad = $request->afectividad;
        $ficha->psicomotricidad = $request->psicomotricidad;
        $ficha->insigth = $request->insigth;
        $ficha->diagnostico_presuntivo = $request->diagnostico_presuntivo;
        $ficha->diagnostico_diferencial = $request->diagnostico_diferencial;
        $ficha->plan_tratamiento = $request->plan_tratamiento;
        $ficha->pronostico = $request->pronostico;
        $ficha->evolucion = $request->evolucion;
        $ficha->epicrisis = $request->epicrisis;
        $ficha->save();
        if(auth()->user()->es_paciente == 1){
            return redirect()->route('pacientes.mi-ficha')
            ->with('success', 'Ficha actualizada correctamente');
        }
        return redirect()->route('pacientes.show', $user->id);
    }

    public function sendSeguimiento(Request $request){

       
        $validator = Validator::make($request->all(), [
            'seguimiento_data' => 'required'
        ], [
            'seguimiento_data.required' => 'El campo seguimiento es obligatorio',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->first()]);
        }
        $user = auth()->user();
        $ficha = UserDetalle::where('user_id', $request->paciente_id)->first();
        $seguimiento = new Seguimiento();
        $seguimiento->user_id = $user->id;
        $seguimiento->user_detalle_id = $ficha->id;
        $seguimiento->observaciones = $request->seguimiento_data;
        $seguimiento->fecha = date('Y-m-d');
        $seguimiento->save();
        $agenda = Agenda::where('user_id', $ficha->user_id)->where('estado', 'pendiente')->first();
        if($agenda){
            $agenda->estado = 'finalizado';
            $agenda->save();
        }
        return response()->json(['success' => 'Seguimiento guardado correctamente']);
    }


    public function getSeguimientos(Request $request){
        // dd($request->all());
        $ficha = UserDetalle::where('user_id', $request->paciente_id)->first();
        $seguimientos = Seguimiento::where('user_detalle_id', $ficha->id)->get();
        $psicologo = User::where('id', $seguimientos->first()->user_id)->first();
        if($seguimientos->count() == 0){
            return response()->json(['data' => [
                'observaciones' => 'No hay seguimientos',
                'fecha' => '',
                'user' => ''
            ]]);
        }
        $data = [];
        foreach($seguimientos as $seguimiento){
            $data[] = [
                'observaciones' => $seguimiento->observaciones,
                'fecha' => $seguimiento->created_at->format('d-m-Y H:i'),
                'psicologo' => $psicologo->nombre_profesional,
            ];
        }
        return response()->json(['data' => $data]);
    }
}
