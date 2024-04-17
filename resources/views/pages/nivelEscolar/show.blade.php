@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('nivelEscolar.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $nivelEscolar->descripcion }}</h5>
                    <p class="card-text">{{ $nivelEscolar->created_at }}</p>
                    <a href="{{ route('nivelEscolar.edit', $nivelEscolar->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('nivelEscolar.destroy', $nivelEscolar->id) }}" method="POST" style="display: inline;">
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