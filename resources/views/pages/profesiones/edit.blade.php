@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('profesiones.update', $profesion->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group
                    @error('descripcion')
                        has-danger
                    @enderror">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control
                        @error('descripcion')
                            is-invalid
                        @enderror" id="descripcion" name="descripcion" value="{{$profesion->descripcion}}">
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection