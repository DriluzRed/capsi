@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title
                    ">Fichas de pacientes</h3>
                </div>
            </div>
            <div class="card-body">
                @if(auth()->user()->es_paciente == 1)
                <a href="{{ route('users_detalles.create_pac') }}" class="btn btn-primary mb-3">Crear</a>
                @endif
                <a href="{{ route('users_detalles.create_psi') }}" class="btn btn-primary mb-3">Crear</a>

            </div>
        </div>
    </div>
</div>
@endsection