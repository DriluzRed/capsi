@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Editar la ficha del paciente</h1>
            <a href="{{ route('home') }}" class="btn btn-primary">Ir al Inicio</a>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('ci')
                                has-danger
                            @enderror">
                            <label for="ci">Documento de Identidad</label>
                            <input type="text" name="ci" id="ci" class="form-control" value="{{$paciente->ci}}"required readonly>
                            @error('ci')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombres" id="nombre" class="form-control" value="{{ old('nombre', $paciente->userDetalles[0]->nombres) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('apellido')
                                has-danger
                            @enderror">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellidos" id="apellido" class="form-control" value="{{ old('apellido', $paciente->userDetalles[0]->apellidos) }}" required>
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
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $paciente->userDetalles[0]->telefono) }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('direccion')
                                has-danger
                            @enderror">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $paciente->userDetalles[0]->direccion) }}">
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pais')
                                has-danger
                            @enderror">
                            <label for="pais">Pais</label>
                            <select name="pais_id" id="pais" class="form-control select2" required>
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
                            <select name="departamento_id" id="departamento" class="form-control select2" required>
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
                            <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion', $paciente->userDetalles[0]->religion) }}">
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_padre')
                                has-danger
                            @enderror">
                            <label for="nombre_padre">Nombre del Padre</label>
                            <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" value="{{ old('nombre_padre', $paciente->userDetalles[0]->nombre_padre) }}">
                            @error('nombre_padre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('nombre_madre')
                                has-danger
                            @enderror">
                            <label for="nombre_madre">Nombre de la Madre</label>
                            <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" value="{{ old('nombre_madre', $paciente->userDetalles[0]->nombre_madre) }}">
                            @error('nombre_madre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('tiene_tutor')
                                has-danger
                            @enderror">
                            <label for="tiene_tutor">¿Tiene Tutor?</label>
                            <select name="tiene_tutor" id="tiene_tutor" class="form-control">
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
                            <input type="text" name="tutor" id="nombre_tutor" class="form-control" value="{{ old('nombre_tutor', $paciente->userDetalles[0]->nombre_tutor) }}">
                            @error('nombre_tutor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('cant_hermanos')
                                has-danger
                            @enderror">
                            <label for="cant_hermanos">Cantidad de Hermanos</label>
                            <input type="number" name="cant_hermanos" id="cant_hermanos" class="form-control" value="{{ old('cant_hermanos', $paciente->userDetalles[0]->cant_hermanos) }}">
                            @error('cant_hermanos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('lugar_trabajo')
                                has-danger
                            @enderror">
                            <label for="lugar_trabajo">Lugar de Trabajo</label>
                            <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control" value="{{ old('lugar_trabajo', $paciente->userDetalles[0]->lugar_trabajo) }}">
                            @error('lugar_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="form-grouop 
                            @error('situacion_laboral_id')
                                has-danger
                                @enderror">
                            <label for="situacion_laboral_id">Situación Laboral</label>
                            <select name="situacion_laboral_id" id="situacion_laboral_id" class="form-control">
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
                            <select name="nivel_escolaridad_id" id="nivel_escolaridad_id" class="form-control">
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
                            <input type="text" name="nro_emergencia" id="nro_emergencia" class="form-control" value="{{ old('nro_emergencia', $paciente->userDetalles[0]->nro_emergencia) }}" >
                            @error('nro_emergencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('motivo_consulta')
                                has-danger
                            @enderror">
                            <label for="motivo_consulta">Motivo de Consulta</label>
                            <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control" value="{{ old('motivo_consulta', $paciente->userDetalles[0]->motivo_consutla)}}">
                            @error('motivo_consulta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="antecedentes_personales">Antecedentes Personales</label>
                            <input type="text" name="antecedentes_personales" id="antecedentes_personales" class="form-control" value="{{ old('antecedentes_personales', $paciente->userDetalles[0]->antecedentes_personales) }}">
                            @error('antecedentes_personales')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="antecedentes_familiares">Antecedentes Familiares</label>
                            <input type="text" name="antecedentes_familiares" id="antecedentes_familiares" class="form-control" value="{{ old('antecedentes_familiares', $paciente->userDetalles[0]->antecedentes_familiares) }}">
                            @error('antecedentes_familiares')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="examen_medico">Examen Médico</label>
                            <input type="text" name="examen_medico" id="examen_medico" class="form-control" value="{{ old('examen_medico', $paciente->userDetalles[0]->examen_medico) }}" >
                            @error('examen_medico')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('examen_psicopatolico')
                                has-danger
                            @enderror">
                            <label for="examen_psicopatolico">Examen Psicopatológico</label>
                            <input type="text" name="examen_psicopatolico" id="examen_psicopatolico" class="form-control" value="{{ old('examen_psicopatolico', $paciente->userDetalles[0]->examen_psicopatolico) }}">
                            @error('examen_psicopatolico')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('disimulacion')
                                has-danger
                            @enderror">
                            <label for="disimulacion">Disimulación</label>
                            <input type="text" name="disimulacion" id="disimulacion" class="form-control" value="{{ old('disimulacion', $paciente->userDetalles[0]->disimulacion) }}">
                            @error('disimulacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('aspecto_del_paciente')
                                has-danger
                            @enderror">
                            <label for="aspecto_del_paciente">Aspecto del Paciente</label>
                            <input type="text" name="aspecto_del_paciente" id="aspecto_del_paciente" class="form-control" value="{{ old('aspecto_del_paciente', $paciente->userDetalles[0]->aspecto_del_paciente) }}">
                            @error('aspecto_del_paciente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('actitud')
                                has-danger
                            @enderror">
                            <label for="actitud">Actitud</label>
                            <input type="text" name="actitud" id="actitud" class="form-control" value="{{ old('actitud', $paciente->userDetalles[0]->actitud) }}">
                            @error('actitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('contacto_visual')
                                has-danger
                            @enderror">
                            <label for="contacto_visual">Contacto Visual</label>
                            <input type="text" name="contacto_visual" id="contacto_visual" class="form-control" value="{{ old('contacto_visual', $paciente->userDetalles[0]->contacto_visual) }}">
                            @error('contacto_visual')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('atencion_orientacion_temp_espa')
                                has-danger
                            @enderror">
                            <label for="atencion_orientacion_temp_espa">Atención y Orientación Temporal y Espacial</label>
                            <input type="text" name="atencion_orientacion_temp_espa" id="atencion_orientacion_temp_espa" class="form-control" value="{{ old('atencion_orientacion_temp_espa', $paciente->userDetalles[0]->atencion_orientacion_temp_espa) }}">
                            @error('atencion_orientacion_temp_espa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('memoria')
                                has-danger
                            @enderror">
                            <label for="memoria">Memoria</label>
                            <input type="text" name="memoria" id="memoria" class="form-control" value="{{ old('memoria', $paciente->userDetalles[0]->memoria) }}">
                            @error('memoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('sensoperecepcion')
                                has-danger
                            @enderror">
                            <label for="sensoperecepcion">Sensopercepción</label>
                            <input type="text" name="sensoperecepcion" id="sensoperecepcion" class="form-control" value="{{ old('sensoperecepcion', $paciente->userDetalles[0]->sensoperecepcion) }}">
                            @error('sensoperecepcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pensamiento')
                                has-danger
                            @enderror">
                            <label for="pensamiento">Pensamiento</label>
                            <input type="text" name="pensamiento" id="pensamiento" class="form-control" value="{{ old('pensamiento', $paciente->userDetalles[0]->pensamiento) }}">
                            @error('pensamiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('afectividad')
                                has-danger
                            @enderror">
                            <label for="afectividad">Afectividad</label>
                            <input type="text" name="afectividad" id="afectividad" class="form-control" value="{{ old('afectividad', $paciente->userDetalles[0]->afectividad) }}">
                            @error('afectividad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('psicomotricidad')
                                has-danger
                            @enderror">
                            <label for="psicomotricidad">Psicomotricidad</label>
                            <input type="text" name="psicomotricidad" id="psicomotricidad" class="form-control" value="{{ old('psicomotricidad', $paciente->userDetalles[0]->psicomotricidad) }}">
                            @error('psicomotricidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('insigth')
                                has-danger
                            @enderror">
                            <label for="insigth">Insigth</label>
                            <input type="text" name="insigth" id="insigth" class="form-control" value="{{ old('insigth', $paciente->userDetalles[0]->insigth) }}">
                            @error('insigth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('diagnostico_presuntivo')
                                has-danger
                            @enderror">
                            <label for="diagnostico_presuntivo">Diagnóstico Presuntivo</label>
                            <input type="text" name="diagnostico_presuntivo" id="diagnostico_presuntivo" class="form-control" value="{{ old('diagnostico_presuntivo', $paciente->userDetalles[0]->diagnostico_presuntivo) }}">
                            @error('diagnostico_presuntivo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('diagnostico_diferencial')
                                has-danger
                            @enderror">
                            <label for="diagnostico_diferencial">Diagnóstico Diferencial</label>
                            <input type="text" name="diagnostico_diferencial" id="diagnostico_diferencial" class="form-control" value="{{ old('diagnostico_diferencial', $paciente->userDetalles[0]->diagnostico_diferencial) }}">
                            @error('diagnostico_diferencial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('plan_tratamiento')
                                has-danger
                            @enderror">
                            <label for="plan_tratamiento">Plan de Tratamiento</label>
                            <input type="text" name="plan_tratamiento" id="plan_tratamiento" class="form-control" value="{{ old('plan_tratamiento', $paciente->userDetalles[0]->plan_tratamiento) }}" >
                            @error('plan_tratamiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pronostico')
                                has-danger
                            @enderror">
                            <label for="pronostico">Pronóstico</label>
                            <input type="text" name="pronostico" id="pronostico" class="form-control" value="{{ old('pronostico', $paciente->userDetalles[0]->pronostico) }}" >
                            @error('pronostico')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('evolucion')
                                has-danger
                            @enderror">
                            <label for="evolucion">Evolución</label>
                            <input type="text" name="evolucion" id="evolucion" class="form-control" value="{{ old('evolucion', $paciente->userDetalles[0]->evolucion) }}">
                            @error('evolucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('epicrisis')
                                has-danger
                            @enderror">
                            <label for="epicrisis">Epicrisis</label>
                            <input type="text" name="epicrisis" id="epicrisis" class="form-control" value="{{ old('epicrisis', $paciente->userDetalles[0]->epicrisis) }}">
                            @error('epicrisis')
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
