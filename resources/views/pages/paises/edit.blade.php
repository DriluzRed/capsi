@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Editar Pais</h1>
            <a href="{{ route('paises.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('paises.update', $pais->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $pais->nombre }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
