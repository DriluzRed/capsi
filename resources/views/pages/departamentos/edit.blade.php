@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">EDITAR DEPARTAMENTO</h1>
            <a href="{{ route('departamentos.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-reply"></i></a>
            </br>
            </br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $departamento->nombre }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('pais_id')
                                has-danger
                            @enderror">
                            <label for="pais_id">Pais</label>
                            <select name="pais" id="pais_id" class="form-control" required>
                                <option value="">Seleccione un pais</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" {{ $departamento->pais_id == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                            @error('pais_id')
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