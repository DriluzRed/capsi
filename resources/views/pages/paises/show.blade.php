@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{ route('paises.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pais->nombre }}</h5>
                    <p class="card-text">{{ $pais->created_at }}</p>
                    <a href="{{ route('paises.edit', $pais->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('paises.destroy', $pais->id) }}" method="POST" style="display: inline;">
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