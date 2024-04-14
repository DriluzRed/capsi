@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('ingresos.update', $ingreso->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group
                    @error('nombre')
                        has-danger
                    @enderror">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control
                        @error('nombre')
                            is-invalid
                        @enderror" id="nombre" name="nombre" value="{{$ingreso->nombre}}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{$ingreso->fecha}}">
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" class="form-control" id="total" name="total" value="{{$ingreso->fecha}}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection