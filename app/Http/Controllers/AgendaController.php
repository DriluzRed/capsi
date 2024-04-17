<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {   
        return view('pages.agendas.index');
    }

    public function events()
    {
        $agenda = Agenda::all();
        $events = [];

        foreach ($agenda as $item) {
            $events[] = [
                'title' => 'Turno ocupado',
                'description' => $item->descripcion,
                'turno' => "Turno ".$item->turno->descripcion,
                'paciente' => $item->paciente->name,
                'psicologo' => $item->profesional->name,
                'start' => $item->fecha,
                'end' => $item->fecha,
                'hora' => $item->hora,
            ];
        }
        return response()->json($events);
    }
}
