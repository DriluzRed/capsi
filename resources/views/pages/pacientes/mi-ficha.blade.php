@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Editar mi ficha</h1>
            <a href="{{ route('home') }}" class="btn btn-primary">Ir al Inicio</a>
            <div class="card">
                <div class="card-body">
                    
                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $paciente->userDetalles[0]->nombres) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('apellido')
                                has-danger
                            @enderror">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $paciente->userDetalles[0]->apellidos) }}" required>
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('fecha_nacimiento')
                                has-danger
                            @enderror">
                            <label for="edad">Edad</label>
                            <input type="text" name="edad" id="edad" class="form-control" value="{{old('edad', $paciente->userDetalles[0]->edad) }}" required>
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('sexo') has-danger @enderror">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="M" {{ old('sexo', $paciente->userDetalles[0]->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('sexo', $paciente->userDetalles[0]->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
                            </select>
                            @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('estado_civil') has-danger @enderror">
                            <label for="estado_civil">Estado Civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="Soltero" {{ old('estado_civil', $paciente->userDetalles[0]->estado_civil) == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                <option value="Casado" {{ old('estado_civil', $paciente->userDetalles[0]->estado_civil) == 'Casado' ? 'selected' : '' }}>Casado</option>
                                <option value="Divorciado" {{ old('estado_civil', $paciente->userDetalles[0]->estado_civil) == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                <option value="Viudo" {{ old('estado_civil', $paciente->userDetalles[0]->estado_civil) == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                            </select>
                            @error('estado_civil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('edad') has-danger @enderror">
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $paciente->userDetalles[0]->edad) }}" required>
                            @error('edad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('telefono')
                                has-danger
                            @enderror">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $paciente->userDetalles[0]->telefono) }}" required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('direccion')
                                has-danger
                            @enderror">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $paciente->userDetalles[0]->direccion) }}" required>
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
                                    <option value="{{ $pais->id }}" {{ old('pais', $paciente->userDetalles[0]->pais_id) == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
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
                                    <option value="{{ $departamento->id }}" {{ old('departamento', $paciente->userDetalles[0]->departamento_id) == $departamento->id ? 'selected' : '' }}>{{ $departamento->nombre }}</option>
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
                                    <option value="{{ $ciudad->id }}" {{ old('ciudad_id', $paciente->userDetalles[0]->ciudad_id) == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group
                            @error('religion')
                                has-danger
                            @enderror">
                            <label for="religion">Religión</label>
                            <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion', $paciente->userDetalles[0]->religion) }}" required>
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_padre')
                                has-danger
                            @enderror">
                            <label for="nombre_padre">Nombre del Padre</label>
                            <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" value="{{ old('nombre_padre', $paciente->userDetalles[0]->nombre_padre) }}" required>
                            @error('nombre_padre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_madre')
                                has-danger
                            @enderror">
                            <label for="nombre_madre">Nombre de la Madre</label>
                            <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" value="{{ old('nombre_madre', $paciente->userDetalles[0]->nombre_madre) }}" required>
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
                                <option value="1" {{ old('tiene_tutor', $paciente->userDetalles[0]->tiene_tutor) == 1 ? 'selected' : '' }}>Si</option>
                                <option value="0" {{ old('tiene_tutor', $paciente->userDetalles[0]->tiene_tutor) == 0 ? 'selected' : '' }}>No</option>
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
                            <input type="text" name="tutor" id="nombre_tutor" class="form-control" value="{{ old('nombre_tutor', $paciente->userDetalles[0]->nombre_tutor) }}" required>
                            @error('nombre_tutor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('cant_hermanos')
                                has-danger
                            @enderror">
                            <label for="cant_hermanos">Cantidad de Hermanos</label>
                            <input type="number" name="cant_hermanos" id="cant_hermanos" class="form-control" value="{{ old('cant_hermanos', $paciente->userDetalles[0]->cant_hermanos) }}" required>
                            @error('cant_hermanos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('lugar_trabajo')
                                has-danger
                            @enderror">
                            <label for="lugar_trabajo">Lugar de Trabajo</label>
                            <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control" value="{{ old('lugar_trabajo', $paciente->userDetalles[0]->lugar_trabajo) }}" required>
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
                                    <option value="{{ $situacion_laboral->id }}" {{ old('situacion_laboral_id', $paciente->userDetalles[0]->situacion_laboral_id) == $situacion_laboral->id ? 'selected' : '' }}>{{ $situacion_laboral->descripcion }}</option>
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
                                    <option value="{{ $escolaridad->id }}" {{ old('nivel_estudio_id', $paciente->userDetalles[0]->nivel_escolaridad_id) == $escolaridad->id ? 'selected' : '' }}>{{ $escolaridad->descripcion }}</option>
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
                            <input type="text" name="nro_emergencia" id="nro_emergencia" class="form-control" value="{{ old('nro_emergencia', $paciente->userDetalles[0]->nro_emergencia) }}" required>
                            @error('nro_emergencia')
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
@endsection
                    