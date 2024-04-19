@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{$title}}</h1>
            <form action="{{ route('situacionLaboral.store') }}" method="POST">
                @csrf
                <div class="form-group
                    @error('descripcion')
                        has-danger
                    @enderror">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control
                        @error('descripcion')
                            is-invalid
                        @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
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

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Situacion Laboral</h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('situacionLaboral.index') }}" class="btn btn-primary btn-sm">Volver</a>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row justify-content-center">
            <div class="col-12 col
            -md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Crear Situación Laboral</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('situacionLaboral.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('descripcion')
                                        has-danger
                                    @enderror">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
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
    </section>
</div>
@endsection
