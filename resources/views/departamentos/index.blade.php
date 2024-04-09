@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('departamentos.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->nombre }}</td>
                        <td> {{$departamento->pais->nombre}}</td>
                        <td>
                            <a href="{{ route('departamentos.show', $departamento->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display: inline;">
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