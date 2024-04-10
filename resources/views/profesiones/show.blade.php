@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('profesiones.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $profesion->descripcion }}</h5>
                    <p class="card-text">{{ $profesion->created_at }}</p>
                    <a href="{{ route('profesiones.edit', $profesion->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('profesiones.destroy', $profesion->id) }}" method="POST" style="display: inline;">
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