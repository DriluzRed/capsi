@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Usuarios</h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">Volver</a>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row justify-content-center">
            <div class="col-12 col
            -md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Editar Usuario</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group
                                    @error('name')
                                        has-danger
                                    @enderror">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                @error('nombre_profesional')
                                    has-danger
                                @enderror">
                                <label for="nombre_profesional">Nombre Profesional si es psicologo</label>
                                <input type="text" name="nombre_profesional" id="nombre_profesional" class="form-control" value="{{ $user->nombre_profesional }}">
                                @error('nombre_profesional')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="form-group
                                    @error('email')
                                        has-danger
                                    @enderror">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('password')
                                        has-danger
                                    @enderror">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('roles')
                                        has-danger
                                    @enderror">
                                    <label for="roles">Roles</label>
                                    <select  id="roles" class="form-control select2" id="roles" name="roles[]" multiple="multiple">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('permissions')
                                        has-danger
                                    @enderror">
                                    <label for="permissions">Permisos</label>
                                    <select class="form-control select2" id="permissions" name="permissions[]" multiple="multiple">
                                        @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ $user->permissions->contains($permission->id) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('es_paciente')
                                        has-danger
                                    @enderror">
                                    <label for="es_paciente">Paciente</label>
                                    <select class="form-control" id="es_paciente" name="es_paciente">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    @error('es_paciente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection



