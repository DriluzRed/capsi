@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">EDITAR ESPECIALIDAD</h1>
            <a href="{{ route('especialidades.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-reply"></i></a>
            </br>
            </br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('especialidades.update', $especialidad->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $especialidad->nombre }}" required>
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
