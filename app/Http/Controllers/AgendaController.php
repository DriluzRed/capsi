<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\User;
use App\Models\UserDetalle;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index()
    {   
        return view('pages.agendas.index');
    }

    public function events()
    {
        $agenda = Agenda::where('profesional_id', auth()->user()->id)
        ->where('estado', 'pendiente')
        ->with(['paciente', 'paciente.userDetalles'])->get();
        $events = [];

        foreach ($agenda as $item) {
            $events[] = [
                'title' => 'Turno ocupado',
                'description' => $item->descripcion,
                'turno' => "Turno ".$item->turno->descripcion,
                'paciente' => $item->paciente->userDetalles[0]->nombres . ' ' . $item->paciente->userDetalles[0]->apellidos,
                'psicologo' => $item->profesional->nombre_profesional,
                'start' => $item->fecha,
                'end' => $item->fecha,
                'hora' => $item->hora,
                'estado' => $item->estado,
                'ficha' => $item->paciente->userDetalles[0]->user_id,
                
            ];
        }
        return response()->json($events);
    }

    public function solicitarTurno()
    {

        $turnos = Turno::all();
        $profesionales = User::where('es_paciente', 0)
        ->where('ci', '<>', 0)
        ->get();
        return view('pages.agendas.solicitar')
        ->with('turnos', $turnos)
        ->with('profesionales', $profesionales);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'profesional_id' => 'required',
            'descripcion' => 'required',
        ],
            [ 
                'fecha.required' => 'El campo fecha es obligatorio',
                'hora.required' => 'El campo hora es obligatorio',
                'profesional_id.required' => 'El profesional es obligatorio',
                'descripcion.required' => 'El campo descripción es obligatorio',
            ]
        );
           
            $existingAgenda = Agenda::where('fecha', $request->fecha)
                ->where('hora', '=', $request->hora)
                ->where('profesional_id', $request->profesional_id)
                ->first();
            $profesional = User::find($request->profesional_id);
            $horaSolicitada = Carbon::parse($request->hora);
            $horaInicioProfesional = Carbon::parse($profesional->rango_hora_start);
            $horaFinProfesional = Carbon::parse($profesional->rango_hora_end);
            $existingFicha = UserDetalle::where('user_id', auth()->user()->id)->first();


            if (!$horaSolicitada->between($horaInicioProfesional, $horaFinProfesional)) {
                return redirect()->back()
                    ->with('error', 'La hora solicitada está fuera del rango de horas disponibles del profesional');
            }
            if ($existingAgenda) {
                return redirect()->back()
                    ->with('error', 'Ya existe un agendamiento para esa fecha y hora con el mismo profesional');
            }
            if(!$existingFicha){
                return redirect()->back()
                    ->with('error', 'Debe completar su ficha antes de solicitar un turno');
            }

        $agenda = new Agenda();
        $agenda->fecha = $request->fecha;
        $agenda->hora = $request->hora;
        $agenda->turno_id = $request->turno_id;
        $agenda->profesional_id = $request->profesional_id;
        $agenda->user_id = auth()->user()->id;
        $agenda->descripcion = $request->descripcion;
        $agenda->save();

        return redirect()->route('home')
        ->with('mensaje', 'Turno agendado exitosamente');
    }

    public function cancelarTurno($id)
    {
        $date = Carbon::now()->format('Y-m-d');
        if($date >= Agenda::find($id)->fecha){
            return redirect()->route('home')
            ->with('error', 'No se puede cancelar un turno en el dia de la consulta');
        }
        $agenda = Agenda::find($id);
        $agenda->update([
            'estado' => 'cancelado'
        ]);
        return redirect()->route('home')
        ->with('success', 'Turno cancelado con éxito');
    }
}
