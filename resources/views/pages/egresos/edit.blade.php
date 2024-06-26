@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">EDITAR EGRESOS</h1>
            <a href="{{ route('egresos.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-reply"></i></a>
            </br>
            </br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('egresos.update', $egreso->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('nombre')
                                has-danger
                            @enderror">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $egreso->descripcion) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('fecha')
                                has-danger
                            @enderror">
                            <label for="fecha">Fecha</label>
                            <input type="text" name="fecha" id="fecha" class="form-control datepicker" value="{{old('fecha', $egreso->fecha) }}" required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group 
                            @error('monto')
                                has-danger
                            @enderror">
                            <label for="monto">Monto</label>
                            <input type="number" name="monto" id="monto" class="form-control" value="{{  old('monto', $egreso->total)}}" required>
                            @error('monto')
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