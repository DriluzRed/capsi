@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-reply"></i></a>
            </br>
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
                        ">CREAR USUARIO</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('ci')
                                        has-danger
                                    @enderror">
                                    <label for="ci">Documento de Identidad</label>
                                    <input type="text" name="ci" id="ci" class="form-control @error('ci')
                                    is-invalid
                                @enderror" value="{{old('ci')}}"required>
                                    @error('ci')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('name')
                                        has-danger
                                    @enderror">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name')
                                    is-invalid
                                @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group
                                    @error('email')
                                        has-danger
                                    @enderror">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email')
                                    is-invalid
                                @enderror" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('password')
                                        has-danger
                                    @enderror">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password')
                                    is-invalid
                                @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('roles')
                                        has-danger
                                    @enderror">
                                    <label for="roles">Roles</label>
                                    <select class="form-control select2" id="roles" name="roles[]" multiple="multiple">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('es_paciente')
                                        has-danger
                                    @enderror">
                                    <label for="es_paciente select2">Es Paciente</label>
                                    <select class="form-control" id="es_paciente" name="es_paciente" required>
                                        <option value="">Seleccione una opcion</option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    @error('es_paciente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('permissions')
                                        has-danger
                                    @enderror" id="permissionsDiv">
                                    <label for="permissions">Permisos</label>
                                    <select class="form-control select2" id="permissions" name="permissions[]" multiple="multiple">
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('permissions')
                                        has-danger
                                    @enderror" id="especialidadesDiv">
                                    <label for="permissions">Especialidades</label>
                                    <select class="form-control select2" id="especialidades" name="especialidades[]" multiple="multiple">
                                        @foreach($especialidades as $especialidad)
                                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                @error('nombre_profesional')
                                    has-danger
                                @enderror" id="nombre_profesionalDiv">
                                <label for="nombre_profesional">Nombre Profesional</label>
                                <input type="text" name="nombre_profesional" id="nombre_profesional" class="form-control">
                                @error('nombre_profesional')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group
                                @error('rango_hora_start')
                                    has-danger
                                @enderror" id="rango_hora_start_div">
                                <label for="nombre_profesional">Inicio de Hora de Atencion</label>
                                <input type="text" name="rango_hora_start" id="rango_hora_start" class="form-control timepicker">
                                @error('rango_hora_start')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group
                                @error('rango_hora_end')
                                    has-danger
                                @enderror" id="rango_hora_end_div">
                                <label for="nombre_profesional">Fin de Hora de Atencion</label>
                                <input type="text" name="rango_hora_end" id="rango_hora_end" class="form-control timepicker">
                                @error('rango_hora_end')
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
@section('page-scripts')
    <script>
        $('#es_paciente').change(function() {
            console.log($(this).val());
                if ($(this).val() === '0') {
                    $('#permissionsDiv').show();
                    $('#especialidadesDiv').show();
                    $('#nombre_profesionalDiv').show();

                } else {
                    $('#permissionsDiv').hide();
                    $('#especialidadesDiv').hide();
                    $('#nombre_profesionalDiv').hide();

                }
            });
    </script>
@endsection