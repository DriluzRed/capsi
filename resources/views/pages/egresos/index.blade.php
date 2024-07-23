@extends('layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
        </div>
        <div class="content-header-right col-md-6 col-12">
           
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-titlecol text-center
                        font-weight-bold">LISTA DE EGRESOS</h4>
                            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('egresos.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table dataTable mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="">Descripcion</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($egresos as $egreso)
                                                <tr>
                                                    <td>{{ $egreso->descripcion }}</td>
                                                    <td>{{ $egreso->fecha }}</td>
                                                    <td decimal-mask>{{ number_format($egreso->total, 0, ',', '.') }} Gs.</td>
                                                    <td>
                                                        <a href="{{ route('egresos.edit', $egreso->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                                                        <form action="{{ route('egresos.destroy', $egreso->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fas fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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