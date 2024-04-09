@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group
                    @error('nombre')
                        has-danger
                    @enderror">
                    <label for="pais">Pais</label>
                    <select class="form-control
                        @error('pais')
                            is-invalid
                        @enderror" id="pais" name="pais">
                        <option value="">Seleccione un pais</option>
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}" {{ $pais->id == $departamento->pais_id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                        @endforeach
                    </select>
                    @error('pais')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control
                        @error('nombre')
                            is-invalid
                        @enderror" id="nombre" name="nombre" value="{{ $departamento->nombre }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection