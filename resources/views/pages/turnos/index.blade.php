@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('turnos.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($turnos as $turno)
                    <tr>
                        <td>{{ $turno->descripcion }}</td>
                        <td>
                            <a href="{{ route('turnos.show', $turno->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('turnos.edit', $turno->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('turnos.destroy', $turno->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('page-scripts')
    @if($message = Session::get('mensaje'))
        <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{$message}}",
        showConfirmButton: false,
        timer: 1500
        });
        </script>
    @endif
    <script>
        $('.delete').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#66a3ac',
                cancelButtonColor: '#6f51ad',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection