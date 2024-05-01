<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <title>Capsi</title>
    <link rel="icon" type="image/png" href="" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <meta name="author" content="CAPSI">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.2.0/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">

    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @yield('page-styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @if (!Auth::guest())
        <div id="wrapper">
            @include('includes.header')
            @include('includes.menu')

            <div class="app-content content">
                
                <div class="content-wrapper p-0">
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endif
    @if(auth()->check())
        @if (auth()->user()->hasAnyRole('Administrador', 'Psicologo'))
            @if(!request()->is('agenda'))
                @include('includes.chat')
            @endif
        @endif
    @endif
    <script src="{{ asset('vendor/AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/AdminLTE-3.2.0/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('vendor/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/AdminLTE-3.2.0/plugins/select2/js/es.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.js"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lang/es.js') }}"></script>

    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/lang/es.js') }}"></script>
    <script src="{{ asset('js/index.global.min.js') }}"></script>




    <script>
        $('#permissionsDiv').hide();
        $('#especialidadesDiv').hide();
        $('#nombre_profesionalDiv').hide();
        if ($('#es_paciente').val() == 0) {
            $('#permissionsDiv').show();
            $('#especialidadesDiv').show();
            $('#nombre_profesionalDiv').show();
        }
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).ready(function() {
            $('.chat-history').scrollTop($('.chat-history').prop('scrollHeight'));
            $("[decimal-mask]").inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                radixPoint: ',',
                digits: 2,
                autoGroup: true,
                autoUnmask: true,
                numericInput: true
            });
            $("[date-mask]").inputmask({
                alias: 'datetime',
                inputFormat: 'dd/mm/yyyy',
                placeholder: 'dd/mm/yyyy',
                clearIncomplete: true
            });

            $(".datepicker").flatpickr({
                dateFormat: "Y-m-d",
                locale: "es"
            });
            $(".timepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es"
            });

            $("[invoice-mask]").inputmask({
                mask: '999-999-9999999',
                placeholder: '_',
                showMaskOnHover: true,
                clearIncomplete: true
            });

            $(".dataTable").DataTable({
                "language": {
                    "url": "{{ asset('js/lang/datatable-es.json') }}"
                }
            });
            let calendarElement = $("#calendar");
            if (calendarElement.length) {
                let calendar = new FullCalendar.Calendar(calendarElement[0], {
                    height: 'auto',
                    width: 'auto',
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    height: 'auto',
                    navLinks: true, 
                    editable: true,
                    selectable: true,
                    selectMirror: true,
                    nowIndicator: true,
                    locale: 'es',
                    events: "{{ route('agenda.events') }}",
                    eventContent: function(arg) {
                        var title = arg.event.title;
                        var description = arg.event.extendedProps.description;
                        var turno = arg.event.extendedProps.turno;
                        var paciente = arg.event.extendedProps.paciente;
                        var psicologo = arg.event.extendedProps.psicologo;
                        var hora = arg.event.extendedProps.hora;
                        var estado = arg.event.extendedProps.estado;
                        var ficha = arg.event.extendedProps.ficha;

                        return {
                            html: 'Hora turno: ' + hora + '<br> Paciente: ' + paciente +
                                '<br> Profesional: ' + psicologo + '<br> Estado: ' + estado +
                                '<br> Nro de Ficha: ' + ficha +
                                '<br> <a href="/pacientes/'+ ficha + '/show" class="btn btn-primary">Ver Ficha</a>'
                        }
                    }
                });
                calendar.render();
            }

            (function() {
            
                $('.chat').hide();
                $('.chat-message-counter').hide();

                $('#live-chat header').on('click', function() {
                    $('.chat').slideToggle(300, 'swing');
                    $('.chat-message-counter').fadeToggle(300, 'swing');
                });
                
                $('.chat-close').on('click', function(e) {
                    e.preventDefault();
                    $('#live-chat').fadeOut(300);
                });
            })();

            $('#chat-message').submit(function(e) {
                e.preventDefault();
                var message = $('#message').val();
                $.ajax({
                    url: '{{ route('send-message') }}',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'message': message,
                    },
                    success: function(response) {
                        $('.chat-history').append('<div class="chat-message clearfix">' +
                        '<img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">' +
                        '<div class="chat-message-content clearfix">' +
                        '<span class="chat-time">' + new Date().toLocaleTimeString() + '</span>' +
                        '<h5>Yo</h5>' +
                        '<p>' + response.data.sent_message + '</p>' +
                        '</div></div><hr>');
                        $('.chat-history').scrollTop($('.chat-history').prop('scrollHeight'));
                        setTimeout(function() {
                            $('.chat-history').append('<div class="chat-message clearfix">' +
                                '<img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">' +
                                '<div class="chat-message-content clearfix">' +
                                '<span class="chat-time">' + new Date().toLocaleTimeString() + '</span>' +
                                '<h5>Bot</h5>' +
                                '<p>' + response.data.received_message + '</p>' +
                                '</div></div><hr>');
                                $('.chat-history').scrollTop($('.chat-history').prop('scrollHeight'));
                        }, 2000);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
                $('#message').val('');
            });
        });
    </script>
    @yield('page-scripts')

</body>

</html>
