<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mensajes = Message::where('user_id', auth()->user()->id)->get();
        $user = auth()->user();
        $psicologos = User::where('es_paciente', 0)
        ->where('ci', '<>', 0)
        ->get();
        $agendas =  Agenda::where('user_id', $user->id)
        ->where('fecha', '>=', date('Y-m-d'))->get();
        return view('home')
        ->with('psicologos', $psicologos)
        ->with('agendas', $agendas);
    }
}
