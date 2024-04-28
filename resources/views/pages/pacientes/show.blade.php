@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            {{-- <h1 class="text-center">FICHA DEL PACIENTE</h1> --}}
    
            <div class="d-flex justify-content-between">
                <a href="{{ route('pacientes.index') }}" class="btn btn-primary" id="volver"><i class="fas fa-solid fa-reply"></i></a>
                
            </div>
            </br>
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <br>
<<<<<<< HEAD
                    <div class="col-sm-6">
                        <p class="card-text">Edad: {{ $paciente->userDetalles[0]->edad }}</p>
                        <p class="card-text">Sexo: {{ $paciente->userDetalles[0]->sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
                        <p class="card-text">Estado Civil: {{ $paciente->userDetalles[0]->estado_civil }}</p>
                        <p class="card-text">Ciudad: {{ $paciente->userDetalles[0]->ciudad->nombre }}</p>
                        <p class="card-text">Departamento: {{ $paciente->userDetalles[0]->departamento->nombre }}</p>
                        <p class="card-text">País: {{ $paciente->userDetalles[0]->pais->nombre }}</p>
                        <p class="card-text">Dirección: {{ $paciente->userDetalles[0]->direccion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Teléfono: {{ $paciente->userDetalles[0]->telefono ?? 'No proporcionado'}}</p>
                        <p class="card-text">Correo: {{ $paciente->email ?? 'No proporcionado' }}</p>
                        <p class="card-text">Nombre del Padre: {{ $paciente->userDetalles[0]->nombre_padre ?? 'No proporcionado'}}</p>
                        <p class="card-text">Nombre de la Madre: {{ $paciente->userDetalles[0]->nombre_madre ?? 'No proporcionado'}}</p>
                        <p class="card-text">Tutor: {{ $paciente->userDetalles[0]->tiene_tutor == 1 ? 'Sí' : 'No' }}</p>
                        <p class="card-text">Nombre del Tutor: {{ $paciente->userDetalles[0]->tutor ?? 'No proporcionado'}}</p>
                        <p class="card-text">Cantidad de Hermanos: {{ $paciente->userDetalles[0]->cant_hermanos ?? 'No proporcionado'}}</p>
                        <p class="card-text">Profesion: {{ $paciente->userDetalles[0]->profesion->descripcion ?? 'No proporcionado'}}</p>
                        <p class="card-text">Lugar de Trabajo: {{ $paciente->userDetalles[0]->lugar_trabajo ?? 'No proporcionado'}}</p>
                        <p class="card-text">Religion: {{ $paciente->userDetalles[0]->religion ?? 'No proporcionado'}}</p>
                        <p class="card-text">Situacion Laboral: {{$paciente->userDetalles[0]->situacion_laboral->descripcion ?? 'No proporcionado'}}</p>
                        <p class="card-text">Escolaridad: {{ $paciente->userDetalles[0]->nivel_escolar->descripcion ?? 'No proporcionado'}}</p>
                        <p class="card-text">Numero de Emergencia: {{ $paciente->userDetalles[0]->nro_emergencia ?? 'No proporcionado'}}</p>
                        <p class="card-text">Motivo de Consulta: {{ $paciente->userDetalles[0]->motivo_consutla ?? 'No proporcionado'}}</p>
                        <p class="card-text">Antecedentes Personales: {{ $paciente->userDetalles[0]->antecedentes_personales ?? 'No proporcionado'}}</p>
                        <p class="card-text">Antecedentes Familiares: {{ $paciente->userDetalles[0]->antecedentes_familiares ?? 'No proporcionado'}}</p>
                        <p class="card-text">Examen Médico: {{ $paciente->userDetalles[0]->examen_medico ?? 'No proporcionado' }}</p>
                        <p class="card-text">Examen Psicopatológico</p>
                        <p class="card-text">Disimulación: {{ $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Simulación: {{ $paciente->userDetalles[0]->simulacion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Aspecto del Paciente: {{ $paciente->userDetalles[0]->aspecto_del_paciente ?? 'No proporcionado' }}</p>
                        <p class="card-text">Contacto Visual: {{ $paciente->userDetalles[0]->contacto_visual ?? 'No proporcionado' }}</p>
                        <p class="card-text">Actitud: {{ $paciente->userDetalles[0]->actitud ?? 'No proporcionado' }}</p>
                        <p class="card-text">Conciencia: {{ $paciente->userDetalles[0]->conciencia ?? 'No proporcionado' }}</p>
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
                        <p class="card-text">Evolución: {{ $paciente->userDetalles[0]->evolucion ?? 'No proporcionado' }}</p>
                        <p class="card-text">Pronóstico: {{ $paciente->userDetalles[0]->pronostico ?? 'No proporcionado' }}</p>
                        <p class="card-text">Epicrisis: {{ $paciente->userDetalles[0]->epicrisis ?? 'No proporcionado' }}</p>
                        @php
                            $data = [
                                'name' => $paciente->userDetalles[0]->nombres . ' ' . $paciente->userDetalles[0]->apellidos,
                                'edad' => $paciente->userDetalles[0]->edad,
                                'sexo' => $paciente->userDetalles[0]->sexo == 'M' ? 'Masculino' : 'Femenino',
                                'estado_civil' => $paciente->userDetalles[0]->estado_civil,
                                'direccion' => $paciente->userDetalles[0]->direccion?? 'No proporcionado',
                                'telefono' => $paciente->userDetalles[0]->telefono ?? 'No proporcionado',
                                'nombre_padre' => $paciente->userDetalles[0]->nombre_padre ?? 'No proporcionado',
                                'nombre_madre' => $paciente->userDetalles[0]->nombre_madre ?? 'No proporcionado',
                                'tutor' => $paciente->userDetalles[0]->tiene_tutor == 1 ? 'Sí' : 'No',
                                'cant_hermanos' => $paciente->userDetalles[0]->cant_hermanos ?? 'No proporcionado',
                                'profesion' => $paciente->userDetalles[0]->profesion->descripcion ?? 'No proporcionado',
                                'lugar_trabajo' => $paciente->userDetalles[0]->lugar_trabajo ?? 'No proporcionado',
                                'religion' => $paciente->userDetalles[0]->religion ?? 'No proporcionado',
                                'situacion_laboral' => $paciente->userDetalles[0]->situacion_laboral->descripcion ?? 'No proporcionado',
                                'nro_emergencia' => $paciente->userDetalles[0]->nro_emergencia ?? 'No proporcionado',
                                'motivo_consulta' => $paciente->userDetalles[0]->motivo_consutla ?? 'No proporcionado',
                                'antecedentes_personales' => $paciente->userDetalles[0]->antecedentes_personales ?? 'No proporcionado',
                                'antecedentes_familiares' => $paciente->userDetalles[0]->antecedentes_familiares ?? 'No proporcionado',
                                'examen_medico' => $paciente->userDetalles[0]->examen_medico ?? 'No proporcionado',
                                'disimulacion' => $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado',
                                'simulacion' => $paciente->userDetalles[0]->simulacion ?? 'No proporcionado',
                                'aspecto_del_paciente' => $paciente->userDetalles[0]->aspecto_del_paciente ?? 'No proporcionado',
                                'contacto_visual' => $paciente->userDetalles[0]->contacto_visual ?? 'No proporcionado',
                                'actitud' => $paciente->userDetalles[0]->actitud ?? 'No proporcionado',
                                'conciencia' => $paciente->userDetalles[0]->conciencia ?? 'No proporcionado',
                                'atencion_orientacion_temp_espa' => $paciente->userDetalles[0]->atencion_orientacion_temp_espa ?? 'No proporcionado',
                                'memoria' => $paciente->userDetalles[0]->memoria ?? 'No proporcionado',
                                'sensoperecepcion' => $paciente->userDetalles[0]->sensoperecepcion ?? 'No proporcionado',
                                'pensamiento' => $paciente->userDetalles[0]->pensamiento ?? 'No proporcionado',
                                'afectividad' => $paciente->userDetalles[0]->afectividad ?? 'No proporcionado',
                                'psicomotricidad' => $paciente->userDetalles[0]->psicomotricidad ?? 'No proporcionado',
                                'insigth' => $paciente->userDetalles[0]->insigth ?? 'No proporcionado',
                                'diagnostico_presuntivo' => $paciente->userDetalles[0]->diagnostico_presuntivo ?? 'No proporcionado',
                                'diagnostico_diferencial' => $paciente->userDetalles[0]->diagnostico_diferencial ?? 'No proporcionado',
                                'plan_tratamiento' => $paciente->userDetalles[0]->plan_tratamiento ?? 'No proporcionado',
                                'evolucion' => $paciente->userDetalles[0]->evolucion ?? 'No proporcionado',
                                'pronostico' => $paciente->userDetalles[0]->pronostico ?? 'No proporcionado',
                                'epicrisis' => $paciente->userDetalles[0]->epicrisis ?? 'No proporcionado',
                            ];
                            $data = json_encode($data);
                        @endphp
                    </div>
                    </br>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning" id="seguimiento">Dar seguimiento</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"id="delete"><i class="fas fa-solid fa-trash"></i></button>
                    </form>
                    {{-- <a href="{{ route('download.pdf', ['id' => $paciente->id]) }}" class="btn btn-info"><i class="fas fa-solid fa-file-export"></i></a> --}}
                    <button class="btn btn-info" id="generatePdf" >Exportar a pdf</button>
=======
                    <h2 class="text-center">Ficha del paciente: {{ $paciente->userDetalles[0]->nombres }} {{ $paciente->userDetalles[0]->apellidos }}</h2>

                    <div class="col-sm-12 d-flex justify-content-center">
                        <table class="table table-bordered">
                            <tr>
                                <td>Edad:</td>
                                <td>{{ $paciente->userDetalles[0]->edad }}</td>
                            </tr>
                            <tr>
                                <td>Sexo:</td>
                                <td>{{ $paciente->userDetalles[0]->sexo == 'M' ? 'Masculino' : 'Femenino' }}</td>
                            </tr>
                            <tr>
                                <td>Estado Civil:</td>
                                <td>{{ $paciente->userDetalles[0]->estado_civil }}</td>
                            </tr>
                            <tr>
                                <td>Ciudad:</td>
                                <td>{{ $paciente->userDetalles[0]->ciudad->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Departamento:</td>
                                <td>{{ $paciente->userDetalles[0]->departamento->nombre }}</td>
                            </tr>
                            <tr>
                                <td>País:</td>
                                <td>{{ $paciente->userDetalles[0]->pais->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Dirección:</td>
                                <td>{{ $paciente->userDetalles[0]->direccion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Teléfono:</td>
                                <td>{{ $paciente->userDetalles[0]->telefono ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Correo:</td>
                                <td>{{ $paciente->email ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Motivo de Consulta:</td>
                                <td>{{ $paciente->userDetalles[0]->motivo_consulta ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Nombre del Padre:</td>
                                <td>{{ $paciente->userDetalles[0]->nombre_padre ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Nombre de la Madre:</td>
                                <td>{{ $paciente->userDetalles[0]->nombre_madre ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Tutor:</td>
                                <td>{{ $paciente->userDetalles[0]->tiene_tutor == 1 ? 'Sí' : 'No' }}</td>
                            </tr>
                            <tr>
                                <td>Nombre del Tutor:</td>
                                <td>{{ $paciente->userDetalles[0]->tutor ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Cantidad de Hermanos:</td>
                                <td>{{ $paciente->userDetalles[0]->cant_hermanos ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Lugar de Trabajo:</td>
                                <td>{{ $paciente->userDetalles[0]->lugar_trabajo ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Religión:</td>
                                <td>{{ $paciente->userDetalles[0]->religion ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Situación Laboral:</td>
                                <td>{{ $paciente->userDetalles[0]->situacion_laboral->descripcion ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Escolaridad:</td>
                                <td>{{ $paciente->userDetalles[0]->nivel_escolar->descripcion ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Número de Emergencia:</td>
                                <td>{{ $paciente->userDetalles[0]->nro_emergencia ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Antecedentes Personales:</td>
                                <td>{{ $paciente->userDetalles[0]->antecedentes_personales ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Antecedentes Familiares:</td>
                                <td>{{ $paciente->userDetalles[0]->antecedentes_familiares ?? 'No proporcionado'}}</td>
                            </tr>
                            <tr>
                                <td>Examen Médico:</td>
                                <td>{{ $paciente->userDetalles[0]->examen_medico ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Examen Psicopatológico:</td>
                                <td>{{ $paciente->userDetalles[0]->examen_psicopatologico ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Disimulación:</td>
                                <td>{{ $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Aspecto del Paciente:</td>
                                <td>{{ $paciente->userDetalles[0]->aspecto_del_paciente ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Actitud:</td>
                                <td>{{ $paciente->userDetalles[0]->actitud ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Contacto Visual:</td>
                                <td>{{ $paciente->userDetalles[0]->contacto_visual ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Atención y Orientación Temporal y Espacial:</td>
                                <td>{{ $paciente->userDetalles[0]->atencion_orientacion_temp_espa ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Memoria:</td>
                                <td>{{ $paciente->userDetalles[0]->memoria ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Sensopercepción:</td>
                                <td>{{ $paciente->userDetalles[0]->sensopercepcion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Pensamiento:</td>
                                <td>{{ $paciente->userDetalles[0]->pensamiento ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Afectividad:</td>
                                <td>{{ $paciente->userDetalles[0]->afectividad ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Psicomotricidad:</td>
                                <td>{{ $paciente->userDetalles[0]->psicomotricidad ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Insight:</td>
                                <td>{{ $paciente->userDetalles[0]->insight ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Diagnóstico Presuntivo:</td>
                                <td>{{ $paciente->userDetalles[0]->diagnostico_presuntivo ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Diagnóstico Diferencial:</td>
                                <td>{{ $paciente->userDetalles[0]->diagnostico_diferencial ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Plan de Tratamiento:</td>
                                <td>{{ $paciente->userDetalles[0]->plan_tratamiento ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Pronóstico:</td>
                                <td>{{ $paciente->userDetalles[0]->pronostico ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Evolución:</td>
                                <td>{{ $paciente->userDetalles[0]->evolucion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Epicrisis:</td>
                                <td>{{ $paciente->userDetalles[0]->epicrisis ?? 'No proporcionado' }}</td>
                            </tr>
                        </table>
                        
                    </div>
                    </br>
                    <button id="cargar_seguimiento" class="btn btn-info" data-toggle="modal" data-target="#seguimiento">Dar Seguimiento</button>
                    <button id="ver_seguimientos" class="btn btn-info" data-toggle="modal" data-target="#seguimientos">Ver Seguimientos</button>
                    <button class="btn btn-info" id="generatePdf" onclick='generatePdf()'>Exportar a pdf</button>
>>>>>>> 56b28d9c944d439451dd0b371b411fe23eefc046
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="seguimiento" tabindex="-1" role="dialog" aria-labelledby="miNuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miNuevoModalLabel">Seguimiento del paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Escriba el comentario</h4>
                   <input type="text" class="form-control" id="seguimiento_data" name="seguimiento_data" placeholder="Seguimiento">
                   <button id="send_seguimiento" class="btn btn-danger mt-2" data-toggle="modal" data-target="#seguimiento">Guardar comentario</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="seguimientos" tabindex="-1" role="dialog" aria-labelledby="miNuevoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miNuevoModalLabel">Seguimientos del paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script>
<<<<<<< HEAD

document.addEventListener('DOMContentLoaded', function () {
    var jsonData = {!! json_encode($data) !!};

    document.getElementById('generatePdf').addEventListener('click', function() {
        $.ajax({
            url: "{{ route('pdf') }}",
            type: 'GET',
            dataType: 'json',
            data: {
                paciente: {!! json_encode($paciente) !!},
                jsonData: JSON.stringify(jsonData)
            },
            success: function(response){
                console.log(response);
            },
            error:function(xhr, status, error){
                console.error(error);
            }
        });
=======
    var modal = $('#seguimiento');
    $('#seguimiento').on('show.bs.modal', function(e) { 
        $('#seguimiento_data').val('');
>>>>>>> 56b28d9c944d439451dd0b371b411fe23eefc046
    });

<<<<<<< HEAD
    // function generatePdf(data) {
    //     console.log(data);
    //     let chat = $('#live-chat')
    //     let volver = $('#volver')
    //     let seguimiento = $('#seguimiento')
    //     let deleteButton = $('#delete')
    //     let generatePdf = $('#generatePdf')
    //     volver.hide();
    //     seguimiento.hide();
    //     deleteButton.hide();
    //     generatePdf.hide();
    //     chat.hide();
    //     window.print();
    //     chat.show();
    //     volver.show();
    //     seguimiento.show();
    //     deleteButton.show();
    //     generatePdf.show();
    // }
=======
        $('#send_seguimiento').click(function(e) {
            var seguimiento_data = $('#seguimiento_data').val();
            let paciente_id = {{ $paciente->id }};
            console.log(seguimiento_data)

            $.ajax({
                url: '/send-seguimiento',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'seguimiento_data': seguimiento_data,
                    'paciente_id': paciente_id
                },
                success: function(response) {
                    if(response.error) {
                        alert(response.error);
                 
                    } else {
                        alert(response.success);
                        modal.modal('hide');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
            $('#seguimiento_data').val('');
        });
        
        $('#seguimientos').on('show.bs.modal', function(e) { 
            let paciente_id = {{ $paciente->id }};
            $.ajax({
                url: '/get-seguimientos',
                method: 'GET',
                data: {
                    'paciente_id': paciente_id
                },
                success: function(response) {
                    if(response.error) {
                        alert(response.error);
                    } else {
                        let seguimientos = response.data;
                        let html = '<table class="table">';
                        html += '<thead><tr><th>Seguimiento</th><th>Fecha</th><th>Psicologo</th></tr></thead><tbody>';
                        for(let i = 0; i < seguimientos.length; i++) {
                            html += '<tr><td>' + seguimientos[i].observaciones + '</td><td>' + seguimientos[i].fecha + '</td><td>' + seguimientos[i].psicologo + '</td></tr>';
                            html += '<tr></tr>';
                        }
                        html += '</tbody></table>';
                        $('#seguimientos .modal-body').html(html);
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        
                
                
    function generatePdf(data) {
        console.log(data);
        let chat = $('#live-chat')
        let volver = $('#volver')
        let seguimiento = $('#cargar_seguimiento')
        let deleteButton = $('#delete')
        let generatePdf = $('#generatePdf')
        let seguimientos = $('#ver_seguimientos')
        volver.hide();
        seguimiento.hide();
        deleteButton.hide();
        generatePdf.hide();
        chat.hide();
        seguimientos.hide();
        window.print();
        chat.show();
        volver.show();
        seguimiento.show();
        deleteButton.show();
        generatePdf.show();
        seguimientos.show();
    }
>>>>>>> 56b28d9c944d439451dd0b371b411fe23eefc046
</script>
@endsection

