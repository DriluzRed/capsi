@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('ingresos.create') }}" class="btn btn-primary">Crear</a>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->nombre }}</td>
                        <td>{{ $ingreso->fecha }}</td>
                        <td>{{ $ingreso->total }}</td>
                        <td>
                            <a href="{{ route('ingresos.show', $ingreso->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ingresos.destroy', $ingreso->id) }}" method="POST" style="display: inline;">
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