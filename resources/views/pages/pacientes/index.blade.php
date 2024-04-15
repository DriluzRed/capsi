@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Pacientes</h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
       
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Lista de Pacientes</h4>
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('pacientes.create_psico') }}" class="btn btn-primary btn-sm">Crear Ficha para paciente</a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table dataTable">
                                    <thead>
                                        <tr>
                                            <th class="">Nombre</th>
                                            <th>Apellido</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($pacientes as $paciente)
                                            <tr>
                                                <td>{{ $paciente->userDetalles->nombres}}</td>
                                                {{-- <td>{{ $paciente->userDetalles->apellidos }}</td>
                                                <td>{{ $paciente->userDetalles->fecha_nacimiento }}</td> --}}
                                                <td>
                                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
                    