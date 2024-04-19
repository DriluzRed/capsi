@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Editar Especialidad</h1>
            <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Volver</a>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('especialidades.update', $especialidad->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('descripcion')
                                has-danger
                            @enderror">
                            <label for="descripcion">descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $especialidad->descripcion }}" required>
                            @error('descripcion')
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
