
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
                <li id="nombre">Nombre y Apellido: <span class="line"></span></li>
                <li id="edad">Edad: <span class="line"></span></li>
                <li id="sexo">Sexo: <span class="line"></span></li>
                <li id="estado_civil">Estado Civil: <span class="line"></span></li>
                <li id="direccion">Dirección: <span class="line"></span></li>
                <li id="telefono">Teléfono: <span class="line"></span></li>
                <li id="madre">Nombre de la madre: <span class="line"></span></li>
                <li id="padre">Nombre del padre: <span class="line"></span></li>
                <li id="tutor">Tutor/a: <span class="line"></span></li>
                <li id="cant_herm">Número de hermanos: <span class="line"></span></li>
                <br />
                <li id="profesion">Profesion: <span class="line"></span></li>
                <li id="lugar_trab">Lugar de Trabajo o de Estudios: <span class="line"></span></li>
                <li id="religion">Religión: <span class="line"></span></li>
                <li id="situacion_lab">Situación Laboral Actual: <span class="line"></span></li>
                <li id="escolaridad">Escolaridad: <span class="line"></span></li>
                <li id="nro_emergencia">Número de Emergencia: <span class="line"></span></li>
            </ul>
        </div>
        <div class="section">
            <h5>II. Motivo de Consulta:</h5>
            <div class="content"  id="motivo_consulta"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>III. ANTECEDENTES PATOLÓGICOS PERSONAL: (APP)</h5>
            <div class="content"  id="antecedentes_personales"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>IV. ANTECEDENTES PATOLÓGICOS FAMILIARES: (APP)</h5>
            <div class="content"  id="antecedentes_familiares"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>V. EXAMEN MEDICO:</h5>
            <div class="content"  id="examen_medico"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>VI. EXAMEN PSICOPATOLOGICO:</h5>
            <ul>
                <li id="disimulacion">Disimulación (oculta síntomas): <span class="line"></span></li>
                <li id="simulacion">Simulación (quiere aparentar trastornos mentales): <span class="line"></span></li>
                <li id="aspecto_del_paciente">Aspecto del paciente (presentación, arreglo, higiene, etc): <span class="line"></span></li>
                <li id="contacto_visual">Contacto visual (evita, fija): <span class="line"></span></li>
                <li id="actitud">Actitud: <span class="line"></span></li>
                <li id="conciencia">Conciencia: <span class="line"></span></li>
                <li id="atencion_orientacion_temp_espa">Atención y Orientación temporo espacial: <span class="line"></span></li>
                <li id="memoria">Memoria: <span class="line"></span></li>
                <li id="sensoperecepcion">Sensopercepción: <span class="line"></span></li>
                <li id="pensamiento">Pensamiento y lenguaje: <span class="line"></span></li>
                <li id="afectividad">Afectividad: <span class="line"></span></li>
                <li id="psicomotricidad">Psicomotricidad: <span class="line"></span></li>
                <li id="insigth">Insigth <span class="line"></span></li>
            </ul>
        </div>
        <div class="section">
            <h5>VII. DIAGNOSTICO PRESUNTIVO:</h5>
            <div class="content" id="diagnostico_presuntivo"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>VIII. DIAGNOSTICO DIFERENCIAL:</h5>
            <div class="content" id="diagnostico_diferencial"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>IX. PLAN DE TRATAMIENTO:</h5>
            <div class="content" id="plan_tratamiento"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>X. EVOLUCIÓN:</h5>
            <div class="content" id="evolucion"><span class="line"></span></div>
        </div>
        <div class="section">
            <h5>XI. PRONOSTICO:</h5>
            <div class="content" id="pronostico"><<span class="line"></span></div>
        </div>
        <div class="section">
            <h5>XII. EPICRISIS:</h5>
            <div class="content" id="epicrisis"><span class="line"></span></div>
        </div>

    </div>
</body>
</html>

@section('page-scripts')    
<script>
        document.addEventListener("DOMContentLoaded", function() {
         
            var jsonDataString = window.location.search.split('=')[1];
            var jsonData = JSON.parse(decodeURIComponent(jsonDataString));
          
            document.getElementById('nombre').innerText = jsonData.name;
            document.getElementById('edad').innerText = jsonData.edad;
            document.getElementById('sexo').innerText = jsonData.sexo;
            document.getElementById('estado_civil').innerText = jsonData.estado_civil;
            document.getElementById('direccion').innerText = jsonData.direccion;
            document.getElementById('telefono').innerText = jsonData.telefono;
            document.getElementById('madre').innerText = jsonData.nombre_madre;
            document.getElementById('padre').innerText = jsonData.nombre_padre;
            document.getElementById('tutor').innerText = jsonData.tiene_tutor;
            document.getElementById('cant_herm').innerText = jsonData.cant_hermanos;
            document.getElementById('profesion').innerText = jsonData.profesion;
            document.getElementById('lugar_trab').innerText = jsonData.lugar_trabajo;
            document.getElementById('religion').innerText = jsonData.religion;
            document.getElementById('situacion_lab').innerText = jsonData.situacion_laboral;
            document.getElementById('escolaridad').innerText = jsonData.nro_emergencia;
            document.getElementById('nro_emergencia').innerText = jsonData.motivo_consutla;
            document.getElementById('motivo_consulta').innerText = jsonData.antecedentes_personales;
            document.getElementById('antecedentes_personales').innerText = jsonData.antecedentes_familiares;
            document.getElementById('examen_medico').innerText = jsonData.examen_medico;
            document.getElementById('disimulacion').innerText = jsonData.disimulacion;
            document.getElementById('simulacion').innerText = jsonData.simulacion;
            document.getElementById('aspecto_del_paciente').innerText = jsonData.aspecto_del_paciente;
            document.getElementById('contacto_visual').innerText = jsonData.contacto_visual;
            document.getElementById('actitud').innerText = jsonData.actitud;
            document.getElementById('conciencia').innerText = jsonData.conciencia;
            document.getElementById('atencion_orientacion_temp_espa').innerText = jsonData.atencion_orientacion_temp_espa;
            document.getElementById('memoria').innerText = jsonData.memoria;
            document.getElementById('sensoperecepcion').innerText = jsonData.sensoperecepcion;
            document.getElementById('pensamiento').innerText = jsonData.pensamiento;
            document.getElementById('afectividad').innerText = jsonData.afectividad;
            document.getElementById('psicomotricidad').innerText = jsonData.psicomotricidad;
            document.getElementById('insigth').innerText = jsonData.insigth;
            document.getElementById('diagnostico_presuntivo').innerText = jsonData.diagnostico_presuntivo;
            document.getElementById('diagnostico_diferencial').innerText = jsonData.diagnostico_diferencial;
            document.getElementById('plan_tratamiento').innerText = jsonData.plan_tratamiento;
            document.getElementById('evolucion').innerText = jsonData.evolucion;
            document.getElementById('pronostico').innerText = jsonData.pronostico;
            document.getElementById('epicrisis').innerText = jsonData.epicrisis;
            
            setTimeout(function() {
                window.print();
            }, 1000);
        });
    </script>


@section('page-styles')
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
@endsection