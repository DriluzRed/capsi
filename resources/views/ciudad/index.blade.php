@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('ciudad.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ciudad as $ciudad)
                    <tr>
                        <td>{{ $ciudad->nombre }}</td>
                        <td> {{$ciudad->pais->nombre}}</td>
                        <td>
                            <a href="{{ route('ciudad.show', $ciudad->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ciudad.edit', $ciudad->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ciudad.destroy', $ciudad->id) }}" method="POST" style="display: inline;">
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