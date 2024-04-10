@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('situacionLaboral.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($situacionLaboral as $situacionLaboral)
                    <tr>
                        <td>{{ $situacionLaboral->descripcion }}</td>
                        <td>
                            <a href="{{ route('situacionLaboral.show', $situacionLaboral->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('situacionLaboral.edit', $situacionLaboral->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('situacionLaboral.destroy', $situacionLaboral->id) }}" method="POST" style="display: inline;">
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