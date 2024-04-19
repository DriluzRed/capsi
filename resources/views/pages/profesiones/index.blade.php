@extends('layouts.app')

    @section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Profesion</h3>
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
                            ">Lista de Profesiones</h4>
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('profesiones.create') }}" class="btn btn-primary btn-sm">Crear Profesion</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table dataTable">
                                        <thead>
                                            <tr>
                                                <th class="">Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($profesiones as $profesion)
                                                <tr>
                                                    <td>{{ $profesion->descripcion }}</td>
                                                    <td>
                                                        <a href="{{ route('profesiones.edit', $profesion->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                        <form action="{{ route('profesiones.destroy', $profesion->id) }}" method="POST" style="display: inline;">
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