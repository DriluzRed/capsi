@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Ficha del paciente</h1>
            <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Ir al Inicio</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre: {{ $paciente->userDetalles[0]->nombres }} {{ $paciente->userDetalles[0]->apellidos }}</h5>
                    <br>
                    <div class="col-sm-6">
                        <p class="card-text">Edad: {{ $paciente->userDetalles[0]->edad }}</p>
                        <p class="card-text">Sexo: {{ $paciente->userDetalles[0]->sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
                        <p class="card-text">Estado Civil: {{ $paciente->userDetalles[0]->estado_civil }}</p>
                        <p class="card-text">Ciudad: {{ $paciente->userDetalles[0]->ciudad->nombre }}</p>
                        <p class="card-text">Departamento: {{ $paciente->userDetalles[0]->departamento->nombre }}</p>
                        <p class="card-text">País: {{ $paciente->userDetalles[0]->pais->nombre }}</p>
                        <p class="card-text">Dirección: {{ $paciente->userDetalles[0]->direccion }}</p>
                        <p class="card-text">Teléfono: {{ $paciente->userDetalles[0]->telefono }}</p>
                        <p class="card-text">Correo: {{ $paciente->email }}</p>
                        <p class="card-text">Fecha de Nacimiento: {{ $paciente->userDetalles[0]->fecha_nacimiento }}</p>
                        <p class="card-text">Motivo de Consulta: {{ $paciente->userDetalles[0]->motivo_consutla }}</p>
                        <p class="card-text">Nombre del Padre: {{ $paciente->userDetalles[0]->nombre_padre }}</p>
                        <p class="card-text">Nombre de la Madre: {{ $paciente->userDetalles[0]->nombre_madre }}</p>
                        <p class="card-text">Tutor: {{ $paciente->userDetalles[0]->tiene_tutor == 1 ? 'Sí' : 'No' }}</p>
                        <p class="card-text">Nombre del Tutor: {{ $paciente->userDetalles[0]->turo }}</p>
                        <p class="card-text">Cantidad de Hermanos: {{ $paciente->userDetalles[0]->cant_hermanos }}</p>
                        <p class="card-text">Lugar de Trabajo: {{ $paciente->userDetalles[0]->lugar_trabajo }}</p>
                        <p class="card-text">Religion: {{ $paciente->userDetalles[0]->religion }}</p>
                        <p class="card-text">Situacion Laboral: {{$paciente->userDetalles[0]->situacion_laboral->descripcion}}</p>
                        <p class="card-text">Escolaridad: {{ $paciente->userDetalles[0]->nivel_escolar->descripcion}}</p>
                        <p class="card-text">Numero de Emergencia: {{ $paciente->userDetalles[0]->nro_emergencia }}</p><p class="card-text">Motivo de Consulta: {{ $paciente->userDetalles[0]->motivo_consutla }}</p>
                        <p class="card-text">Antecedentes Personales: {{ $paciente->userDetalles[0]->antecedentes_personales }}</p>
                        <p class="card-text">Antecedentes Familiares: {{ $paciente->userDetalles[0]->antecedentes_familiares }}</p>
                        <p class="card-text">Examen Médico: {{ $paciente->userDetalles[0]->examen_medico ?? 'No proporcionado' }}</p>
                        <p class="card-text">Examen Psicopatológico: {{ $paciente->userDetalles[0]->examen_psicopatolico ?? 'No proporcionado' }}</p>
                        <p class="card-text">Disimulación: {{ $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Aspecto del Paciente: {{ $paciente->userDetalles[0]->aspecto_del_paciente ?? 'No proporcionado' }}</p>
                        <p class="card-text">Actitud: {{ $paciente->userDetalles[0]->actitud ?? 'No proporcionado' }}</p>
                        <p class="card-text">Contacto Visual: {{ $paciente->userDetalles[0]->contacto_visual ?? 'No proporcionado' }}</p>
                        <p class="card-text">Atención y Orientación Temporal y Espacial: {{ $paciente->userDetalles[0]->atencion_orientacion_temp_espa ?? 'No proporcionado' }}</p>
                        <p class="card-text">Memoria: {{ $paciente->userDetalles[0]->memoria ?? 'No proporcionado' }}</p>
                        <p class="card-text">Sensopercepción: {{ $paciente->userDetalles[0]->sensoperecepcion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Pensamiento: {{ $paciente->userDetalles[0]->pensamiento ?? 'No proporcionado' }}</p>
                        <p class="card-text">Afectividad: {{ $paciente->userDetalles[0]->afectividad ?? 'No proporcionado' }}</p>
                        <p class="card-text">Psicomotricidad: {{ $paciente->userDetalles[0]->psicomotricidad ?? 'No proporcionado' }}</p>
                        <p class="card-text">Insigth: {{ $paciente->userDetalles[0]->insigth ?? 'No proporcionado' }}</p>
                        <p class="card-text">Diagnóstico Presuntivo: {{ $paciente->userDetalles[0]->diagnostico_presuntivo ?? 'No proporcionado' }}</p>
                        <p class="card-text">Diagnóstico Diferencial: {{ $paciente->userDetalles[0]->diagnostico_diferencial ?? 'No proporcionado' }}</p>
                        <p class="card-text">Plan de Tratamiento: {{ $paciente->userDetalles[0]->plan_tratamiento ?? 'No proporcionado' }}</p>
                        <p class="card-text">Pronóstico: {{ $paciente->userDetalles[0]->pronostico ?? 'No proporcionado' }}</p>
                        <p class="card-text">Evolución: {{ $paciente->userDetalles[0]->evolucion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Epicrisis: {{ $paciente->userDetalles[0]->epicrisis ?? 'No proporcionado' }}</p>

                    </div>

                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Dar seguimiento</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection