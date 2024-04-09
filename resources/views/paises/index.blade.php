@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('paises.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paises as $pais)
                    <tr>
                        <td>{{ $pais->nombre }}</td>
                        <td>
                            <a href="{{ route('paises.show', $pais->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('paises.edit', $pais->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('paises.destroy', $pais->id) }}" method="POST" style="display: inline;">
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