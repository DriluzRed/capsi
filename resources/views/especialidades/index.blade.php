@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($especialidades as $especialidad)
                    <tr>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>
                            <a href="{{ route('especialidades.show', $especialidad->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST" style="display: inline;">
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