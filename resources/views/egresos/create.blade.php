@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('egresos.store') }}" method="POST">
                @csrf
                <div class="form-group
                    @error('nombre')
                        has-danger
                    @enderror">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control
                        @error('nombre')
                            is-invalid
                        @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group
                    @error('fecha')
                        has-danger
                    @enderror">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control
                        @error('fecha')
                            is-invalid
                        @enderror" id="fecha" name="fecha" value="{{ old('fecha') }}">
                    @error('fecha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group
                    @error('total')
                        has-danger
                    @enderror">
                    <label for="total">Total</label>
                    <input type="number" class="form-control
                        @error('total')
                            is-invalid
                        @enderror" id="total" name="total" value="{{ old('total') }}">
                    @error('total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection