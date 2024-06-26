@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">EDITAR INGRESO</h1>
            <a href="{{ route('ingresos.index') }}" class="btn btn-primary"><i class="fas fa-solid fa-reply"></i></a>
            </br>
            </br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ingresos.update', $ingreso->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('descripcion')
                                has-danger
                            @enderror">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $ingreso->descripcion) }}" required>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('fecha')
                                has-danger
                            @enderror">
                            <label for="fecha">Fecha</label>
                            <input type="text" name="fecha" id="fecha" class="form-control datepicker" value="{{old('fecha', $ingreso->fecha) }}" required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group 
                            @error('monto')
                                has-danger
                            @enderror">
                            <label for="monto">Monto</label>
                            <input type="number" name="monto" id="monto" class="form-control" value="{{  old('monto', $ingreso->total)}}" required>
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