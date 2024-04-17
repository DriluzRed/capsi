@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('nivelEscolar.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nivelEscolar as $nivelEscolar)
                    <tr>
                        <td>{{ $nivelEscolar->descripcion }}</td>
                        <td>
                            <a href="{{ route('nivelEscolar.show', $nivelEscolar->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('nivelEscolar.edit', $nivelEscolar->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('nivelEscolar.destroy', $nivelEscolar->id) }}" method="POST" style="display: inline;">
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