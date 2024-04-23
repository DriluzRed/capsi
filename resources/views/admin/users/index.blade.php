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
                            <h4 class="card-title   
                            ">LISTA DE USUARIOS</h4>
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table dataTable">
                                        <thead>
                                            <tr>
                                                <th class="">Nombre</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Permisos</th>
                                                <th>Paciente</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach($user->roles as $role)
                                                            <span class="badge badge-primary">{{ $role->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($user->permissions as $permission)
                                                            <span class="badge badge-primary">{{ $permission->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($user->es_paciente == 1)
                                                            <span class="badge badge-primary">Si</span>
                                                        @else
                                                            <span class="badge badge-danger">No</span>
                                                        @endif
                                                    <td>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-solid fa-trash"></i></button>
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