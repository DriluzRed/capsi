@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        {{-- {{dd($agendas)}} --}}
    @if(auth()->user()->es_paciente == 1)

        <h1 class="text-center">Bienvenido/a {{ auth()->user()->name }}</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white text-center">
                        <h3>Nuestros Profesionales</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Psicólogo/a</th>
                                    <th>Especialidades</th>
                                    <th>Hora Inicio de Consultas</th>
                                    <th>Hora Fin de Consultas</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($psicologos as $psicologo)
                                    <tr>
                                        <td>{{ $psicologo->nombre_profesional }}</td>
                                        <td>
                                            @foreach($psicologo->especialidades as $especialidad)
                                                {{ $especialidad->nombre }}<br>
                                            @endforeach
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($psicologo->rango_hora_start)->format('H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($psicologo->rango_hora_end)->format('H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white text-center">
                        <h3>Tus turnos para hoy</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Psicólogo/a</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                                    <tr>
                                        <td>{{$agenda->descripcion}}</td>
                                        <td>
                                            {{ $agenda->profesional->nombre_profesional }}
                                        </td>
                                        <td>{{$agenda->hora}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('includes.loog')
    @endif
</div>
@endsection

