@extends('layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Roles</h3>
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
                            ">Lista de Roles</h4>
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">Crear Rol</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table dataTable">
                                        <thead>
                                            <tr>
                                                <th class="">Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $role)
                                                <tr>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                        <a href="{{ route('admin.roles.destroy', $role->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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