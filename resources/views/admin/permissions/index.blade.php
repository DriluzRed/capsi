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
                            <h3 class="card-title
                            ">LISTA DE PERMISOS</h3>
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-plus"></i></a>
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
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                                                        <a href="{{ route('admin.permissions.destroy', $permission->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-trash"></i></a>
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