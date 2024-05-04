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
                                <td>Profesion:</td>
                                <td>{{ $paciente->userDetalles[0]->profesion->descripcion ?? 'No proporcionado'}}</td>
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
                                <td>Disimulación:</td>
                                <td>{{ $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Simulación:</td>
                                <td>{{ $paciente->userDetalles[0]->simulacion ?? 'No proporcionado' }}</td>
                            </tr>
                            <tr>
                                <td>Conciencia:</td>
                                <td>{{ $paciente->userDetalles[0]->conciencia ?? 'No proporcionado' }}</td>
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
    var modal = $('#seguimiento');
    $('#seguimiento').on('show.bs.modal', function(e) { 
        $('#seguimiento_data').val('');
    });

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
</script>
@endsection

