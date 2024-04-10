@extends('adminlte::page')

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
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection