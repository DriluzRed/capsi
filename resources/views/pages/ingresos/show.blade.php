@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('ingresos.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $ingreso->nombre }}</h5>
                    <p class="card-text">{{ $ingreso->fecha }}</p>
                    <p class="card-text">{{ $ingreso->total }}</p>
                    <p class="card-text">{{ $ingreso->created_at }}</p>
                    <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ingresos.destroy', $ingreso->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection