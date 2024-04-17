@extends('layouts.app')
@section('content')
<div class="container">
    @if(auth()->user()->es_paciente == 1)
        <h1 class="text-center">Bienvenido {{ auth()->user()->name }}</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Detalles</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Especialiddes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($psicologos as $psicologo)
                                    <tr>
                                        <td>{{ $psicologo->nombre_profesional }}</td>
                                        <td>{{ $psicologo->especialidades->nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
</div>
@endsection
