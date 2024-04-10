@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('egresos.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($egresos as $egreso)
                    <tr>
                        <td>{{ $egreso->nombre }}</td>
                        <td>{{ $egreso->fecha }}</td>
                        <td>{{ $egreso->total }}</td>
                        <td>
                            <a href="{{ route('egresos.show', $egreso->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('egresos.edit', $egreso->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('egresos.destroy', $egreso->id) }}" method="POST" style="display: inline;">
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