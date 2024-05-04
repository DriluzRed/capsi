@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">DATOS PERSONALES</h1>
            <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-solid fa-reply"></i></a>
            </br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pacientes.store') }}" method="POST">
                        @csrf
                    <div class="form-group
                        @error('ci')
                            has-danger
                        @enderror">
                        <label for="ci">Documento de Identidad</label>
                        <input type="text" name="ci" id="ci" class="form-control @error('ci') is-invalid @enderror" value="{{$user->ci}}"required readonly>
                        @error('ci')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="form-group">
                            <label for="nombres">Nombre</label>
                            <input type="text" name="nombres" id="nombre" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}" required>
                            @error('nombres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellido</label>
                            <input type="text" name="apellidos" id="apellido" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}" required>
                            @error('apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('fecha_nacimiento')
                                has-danger
                            @enderror">
                            <label for="edad">Edad</label>
                            <input type="text" name="edad" id="edad" class="form-control @error('edad') is-invalid @enderror" value="{{old('edad')}}" required>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control select2 @error('sexo') is-invalid @enderror" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado_civil">Estado Civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-control select2 @error('estado_civil') is-invalid @enderror" required>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viudo">Viudo</option>
                            </select>
                            @error('estado_civil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" pattern="\d*" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}">
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pais_id')
                                has-danger
                            @enderror">
                            <label for="pais">Pais</label>
                            <select name="pais_id" id="pais_id" class="form-control select2 @error('pais_id') is-invalid @enderror" required>
                                <option value="">Seleccione...</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group
                        @error('departamento_id')
                            has-danger
                        @enderror">
                        <label for="departamento">Departamento</label>
                        <select name="departamento_id" id="departamento" class="form-control select2 @error('departamento_id') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group
                        @error('ciudad_id')
                            has-danger
                        @enderror">
                        <label for="ciudad">Ciudad</label>
                        <select name="ciudad_id" id="ciudad_id" class="form-control select2 @error('ciudad_id') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                       
                        <div class="form-group
                            @error('religion')
                                has-danger
                            @enderror">
                            <label for="religion">Religión</label>
                            <input type="text" name="religion" id="religion" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}">
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_padre')
                                has-danger
                            @enderror">
                            <label for="nombre_padre">Nombre del Padre</label>
                            <input type="text" name="nombre_padre" id="nombre_padre" class="form-control @error('nombre_padre') is-invalid @enderror" value="{{ old('nombre_padre') }}">
                            @error('nombre_padre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_madre')
                                has-danger
                            @enderror">
                            <label for="nombre_madre">Nombre de la Madre</label>
                            <input type="text" name="nombre_madre" id="nombre_madre" class="form-control @error('nombre_madre') is-invalid @enderror" value="{{ old('nombre_madre') }}">
                            @error('nombre_madre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('tiene_tutor')
                                has-danger
                            @enderror">
                            <label for="tiene_tutor">¿Tiene Tutor?</label>
                            <select name="tiene_tutor" id="tiene_tutor" class="form-control select2 @error('tiene_tutor') is-invalid @enderror">
                                <option value="">Seleccione...</option>
                                <option value="1" {{ old('tiene_tutor')}}>Si</option>
                                <option value="0" {{ old('tiene_tutor')}}>No</option>
                            </select>
                            @error('tiene_tutor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_tutor')
                                has-danger
                            @enderror">
                            <label for="nombre_tutor">Nombre del Tutor</label>
                            <input type="text" name="tutor" id="nombre_tutor" class="form-control @error('nombre_tutor') is-invalid @enderror" value="{{old('nombre_tutor')}}">
                            @error('nombre_tutor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('cant_hermanos')
                                has-danger
                            @enderror">
                            <label for="cant_hermanos">Cantidad de Hermanos</label>
                            <input type="number" name="cant_hermanos" id="cant_hermanos" class="form-control @error('cant_hermanos') is-invalid @enderror" value="{{ old('cant_hermanos')}}">
                            @error('cant_hermanos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('profesion')
                                has-danger
                            @enderror">
                            <label for="profesion">Profesion</label>
                            <select name="profesion_id" id="profesion_id" class="form-control select2 @error('profesion_id') is-invalid @enderror" required>
                                <option value="">Seleccione...</option>
                                @foreach($profesiones as $profesion)
                                    <option value="{{ $profesion->id }}" {{ old('profesion_id') == $profesion->id ? 'selected' : '' }}>{{ $profesion->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group
                            @error('lugar_trabajo')
                                has-danger
                            @enderror">
                            <label for="lugar_trabajo">Lugar de Trabajo</label>
                            <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control @error('lugar_trabajo') is-invalid @enderror" value="{{ old('lugar_trabajo')}}">
                            @error('lugar_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="form-grouop 
                            @error('situacion_laboral_id')
                                has-danger
                                @enderror">
                            <label for="situacion_laboral_id">Situación Laboral</label>
                            <select name="situacion_laboral_id" id="situacion_laboral_id" class="form-control select2 @error('situacion_laboral_id') is-invalid @enderror">
                                <option value="">Seleccione...</option>
                                @foreach($situaciones_laborales as $situacion_laboral)
                                    <option value="{{ $situacion_laboral->id }}" {{ old('situacion_laboral_id')}}>{{ $situacion_laboral->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('situacion_laboral_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nivel_escolaridad_id')
                                has-danger
                            @enderror">
                            <label for="nivel_escolaridad_id">Nivel de Estudio</label>
                            <select name="nivel_escolaridad_id" id="nivel_escolaridad_id" class="form-control select2 @error('nivel_escolaridad_id') is-invalid @enderror">
                                <option value="">Seleccione...</option>
                                @foreach($escolaridades as $escolaridad)
                                    <option value="{{ $escolaridad->id }}" {{ old('nivel_estudio_id')}}>{{ $escolaridad->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('nivel_escolaridad_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nro_emergencia')
                                has-danger
                            @enderror">
                            <label for="nro_emergencia">Numero de Emergencia</label>
                            <input type="text" name="nro_emergencia" id="nro_emergencia" class="form-control @error('nro_emergencia') is-invalid @enderror" value="{{ old('nro_emergencia')}}">
                            @error('nro_emergencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('motivo_consulta')
                                has-danger
                            @enderror">
                            <label for="motivo_consulta">Motivo de Consulta</label>
                            <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control @error('motivo_consulta') is-invalid @enderror" value="{{ old('motivo_consulta')}}">
                            @error('motivo_consulta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Otros campos del formulario -->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
