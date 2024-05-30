@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
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
                        <h4 class="card-titlecol text-center
                        font-weight-bold">LISTA DE PACIENTES</h4>
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('pacientes.create_psico') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-plus"></i></a>
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
                                            <th>Edad</th>
                                            <th>Motivo de Consulta</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pacientes as $paciente)
                                            @if($paciente->userDetalles && count($paciente->userDetalles) > 0)
                                                <tr>
                                                    <td>{{ $paciente->userDetalles[0]->nombres }}</td>
                                                    <td>{{ $paciente->userDetalles[0]->apellidos }}</td>
                                                    <td>{{ $paciente->userDetalles[0]->edad }}</td>
                                                    <td>{{ $paciente->userDetalles[0]->motivo_consulta }}</td>
                                                    <td>
                                                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-expand"></i> Ver</a>
                                                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
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

@section('page-scripts')
    @if($message = Session::get('mensaje'))
        <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{$message}}",
        showConfirmButton: false,
        timer: 1500
        });
        </script>
    @endif
@endsection