@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Crear nueva ficha</h1>
            <a href="{{ route('home') }}" class="btn btn-primary">Ir al Inicio</a>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pacientes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido') }}" required>
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('fecha_nacimiento')
                                has-danger
                            @enderror">
                            <label for="edad">Edad</label>
                            <input type="text" name="edad" id="edad" class="form-control" value="{{old('edad')}}" required>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado_civil">Estado Civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-control" required>
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
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pais')
                                has-danger
                            @enderror">
                            <label for="pais">Pais</label>
                            <select name="pais" id="pais" class="form-control select2" required>
                                <option value="">Seleccione...</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group
                            @error('ocupacion')
                                has-danger
                            @enderror">
                            <label for="ocupacion">Departamento</label>
                            <select name="departamento" id="departamento" class="form-control select2" required>
                                <option value="">Seleccione...</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group
                            @error('ocupacion')
                                has-danger
                            @enderror">
                            <label for="ocupacion">Ciudad</label>
                            <select name="ciudad_id" id="ciudad_id" class="form-control select2" required>
                                <option value="">Seleccione...</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}"> {{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group
                            @error('religion')
                                has-danger
                            @enderror">
                            <label for="religion">Religión</label>
                            <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion') }}" required>
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_padre')
                                has-danger
                            @enderror">
                            <label for="nombre_padre">Nombre del Padre</label>
                            <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" value="{{ old('nombre_padre') }}" required>
                            @error('nombre_padre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_madre')
                                has-danger
                            @enderror">
                            <label for="nombre_madre">Nombre de la Madre</label>
                            <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" value="{{ old('nombre_madre') }}" required>
                            @error('nombre_madre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('tiene_tutor')
                                has-danger
                            @enderror">
                            <label for="tiene_tutor">¿Tiene Tutor?</label>
                            <select name="tiene_tutor" id="tiene_tutor" class="form-control" required>
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
                            <input type="text" name="tutor" id="nombre_tutor" class="form-control" value="{{old('nombre_tutor')}}" required>
                            @error('nombre_tutor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('cant_hermanos')
                                has-danger
                            @enderror">
                            <label for="cant_hermanos">Cantidad de Hermanos</label>
                            <input type="number" name="cant_hermanos" id="cant_hermanos" class="form-control" value="{{ old('cant_hermanos')}}" required>
                            @error('cant_hermanos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('lugar_trabajo')
                                has-danger
                            @enderror">
                            <label for="lugar_trabajo">Lugar de Trabajo</label>
                            <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control" value="{{ old('lugar_trabajo')}}" required>
                            @error('lugar_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="form-grouop 
                            @error('situacion_laboral_id')
                                has-danger
                                @enderror">
                            <label for="situacion_laboral_id">Situación Laboral</label>
                            <select name="situacion_laboral_id" id="situacion_laboral_id" class="form-control" required>
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
                            <select name="nivel_escolaridad_id" id="nivel_escolaridad_id" class="form-control" required>
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
                            <input type="text" name="nro_emergencia" id="nro_emergencia" class="form-control" value="{{ old('nro_emergencia')}}" required>
                            @error('nro_emergencia')
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
