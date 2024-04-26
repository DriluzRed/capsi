

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historia Clínica</title>
    <style>
        body {
            
            font-family: 'Times New Roman', Times, serif;

        }
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }
        h4 {
            text-align: center;
        }
        h4, h5 {
            text-transform: uppercase;
        }
        h5 {
            text-decoration: underline;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        .content {
            min-height: 200px;
        }
        .line {
            border-bottom: 1px dotted #000;
            width: 100%;
            height: 1px;
        }
        .section {
            margin-bottom: 10px;
            margin-left: 15mm;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Historia Clínica</h4>
        <div class="section">
            <h5>I. Identificación:</h5>
            <ul>
                <li>Nombre y Apellido: <span class="line"> {{ $paciente->userDetalles[0]->nombres }} {{ $paciente->userDetalles[0]->apellidos }}</span></li>
                <li>Nacionalidad: <span class="line"> {{ $paciente->userDetalles[0]->pais->nombre }}</span></li>
                <li>Estado Civil: <span class="line">{{ $paciente->userDetalles[0]->estado_civil }}</span></li>
                <li>Escolaridad: <span class="line"> {{ $paciente->userDetalles[0]->nivel_escolar->descripcion ?? 'No proporcionado'}}</span></li>
                <li>Dirección: <span class="line"></span> {{ $paciente->userDetalles[0]->direccion?? 'No proporcionado' }}</li>
                <li>Nombre de la madre: <span class="line">{{ $paciente->userDetalles[0]->nombre_madre ?? 'No proporcionado'}}</span></li>
                <li>Nombre del padre: <span class="line">{{ $paciente->userDetalles[0]->nombre_padre ?? 'No proporcionado'}}</span></li>
                <li>Número de hermanos: <span class="line">{{ $paciente->userDetalles[0]->cant_hermanos ?? 'No proporcionado'}}</span></li>
                <li>Tutor/a: <span class="line">{{ $paciente->userDetalles[0]->tiene_tutor == 1 ? 'Sí' : 'No' }}</span></li>
                <br />
                <li>Edad <span class="line">{{ $paciente->userDetalles[0]->edad }}</span></li>
                <li>Sexo: <span class="line">{{ $paciente->userDetalles[0]->sexo == 'M' ? 'Masculino' : 'Femenino' }}</span></li>
                <li>Religión: <span class="line">{{ $paciente->userDetalles[0]->religion ?? 'No proporcionado'}}</span></li>
                <li>Teléfono: <span class="line">{{ $paciente->userDetalles[0]->telefono ?? 'No proporcionado'}}</span></li>
                <li>Ocupación: <span class="line">{{$paciente->userDetalles[0]->situacion_laboral->descripcion ?? 'No proporcionado'}}</span></li>
                <li>Lugar de trabajo o estudios <span class="line">{{ $paciente->userDetalles[0]->lugar_trabajo ?? 'No proporcionado'}}</span></li>
                <li>Fecha de Entrada: <span class="line"></span></li>
            </ul>
        </div>
        <div class="section">
            <h5>II. Motivo de Consulta:</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->motivo_consutla ?? 'No proporcionado'}}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>III. ANTECEDENTES PATOLÓGICOS PERSONAL: (APP)</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->antecedentes_personales ?? 'No proporcionado'}}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>IV. ANTECEDENTES PATOLÓGICOS FAMILIARES: (APP)</h5>
            <div class="content">{{ $paciente->userDetalles[0]->antecedentes_familiares ?? 'No proporcionado'}}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>V. EXAMEN MEDICO:</h5>
            <div class="content">{{ $paciente->userDetalles[0]->examen_medico ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>VI. EXAMEN PSICOPATOLOGICO:</h5>
            <ul>
                <li>Disimulación (oculta síntomas): <span class="line"> {{ $paciente->userDetalles[0]->disimulacion ?? 'No proporcionado' }}</span></li>
                <li>Simulación (quiere aparentar trastornos mentales): <span class="line"> {{ $paciente->userDetalles[0]->simulacion ?? 'No proporcionado' }}</span></li>
                <li>Aspecto del paciente (presentación, arreglo, higiene, etc): <span class="line"> {{ $paciente->userDetalles[0]->aspecto_del_paciente ?? 'No proporcionado' }}</span></li>
                <li>Contacto visual (evita, fija): <span class="line">{{ $paciente->userDetalles[0]->contacto_visual ?? 'No proporcionado' }}</span></li>
                <li>Actitud: <span class="line">{{ $paciente->userDetalles[0]->actitud ?? 'No proporcionado' }}</span></li>
                <li>Conciencia: <span class="line"> {{ $paciente->userDetalles[0]->conciencia ?? 'No proporcionado' }}</span></li>
                <li>Atención y Orientación temporo espacial: <span class="line">{{ $paciente->userDetalles[0]->atencion_orientacion_temp_espa ?? 'No proporcionado' }}</span></li>
                <li>Memoria: <span class="line"> {{ $paciente->userDetalles[0]->memoria ?? 'No proporcionado' }}</span></li>
                <li>Sensopercepción: <span class="line"> {{ $paciente->userDetalles[0]->sensoperecepcion ?? 'No proporcionado' }}</span></li>
                <li>Pensamiento y lenguaje: <span class="line">  {{ $paciente->userDetalles[0]->pensamiento ?? 'No proporcionado' }}</span></li>
                <li>Afectividad: <span class="line"> {{ $paciente->userDetalles[0]->afectividad ?? 'No proporcionado' }}</span></li>
                <li>Psicomotricidad: <span class="line"> {{ $paciente->userDetalles[0]->psicomotricidad ?? 'No proporcionado' }}</span></li>
                <li>Insigth <span class="line"> {{ $paciente->userDetalles[0]->insigth ?? 'No proporcionado' }}</span></li>
            </ul>
        </div>
        <div class="section">
            <h5>VII. DIAGNOSTICO PRESUNTIVO:</h5>
            <div class="content">{{ $paciente->userDetalles[0]->diagnostico_presuntivo ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>VIII. DIAGNOSTICO DIFERENCIAL:</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->diagnostico_diferencial ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>IX. PLAN DE TRATAMIENTO:</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->plan_tratamiento ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>X. EVOLUCIÓN:</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->evolucion ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>XI. PRONOSTICO:</h5>
            <div class="content">{{ $paciente->userDetalles[0]->pronostico ?? 'No proporcionado' }}<<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>XII. EPICRISIS:</h5>
            <div class="content"> {{ $paciente->userDetalles[0]->epicrisis ?? 'No proporcionado' }}<span class="line"></span></div>
        </div>

    </div>
</body>
</html>

@section('page-scripts')    
<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Accede al JSON enviado por AJAX
            var jsonData = {!! json_encode($jsonData) !!}; // Reemplaza '$jsonData' con el nombre de la variable que recibirá el JSON en esta página

            // Proporciona los valores correspondientes a cada campo
            document.querySelector('.container li:nth-child(1) .line').innerText = jsonData.nombreCompleto;
            document.querySelector('.container li:nth-child(2) .line').innerText = jsonData.nacionalidad;
            document.querySelector('.container li:nth-child(3) .line').innerText = jsonData.estadoCivil;
            // Continúa para los demás campos
            
            console.log(jsonData); // Puedes manipular el JSON como desees aquí
        });
    </script>
@endsection