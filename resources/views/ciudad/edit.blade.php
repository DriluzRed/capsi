@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('ciudad.update', $ciudad->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group
                    @error('nombre')
                        has-danger
                    @enderror">
                    <label for="departamento">departamento</label>
                    <select class="form-control
                        @error('departamento')
                            is-invalid
                        @enderror" id="departamento" name="departamento">
                        <option value="">Seleccione un departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ $departamento->id == $ciudad->departamento_id ? 'selected' : '' }}>{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    @error('departamento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control
                        @error('nombre')
                            is-invalid
                        @enderror" id="nombre" name="nombre" value="{{ $ciudad->nombre }}">
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