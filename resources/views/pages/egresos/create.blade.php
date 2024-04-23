@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('egresos.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-reply"></i></a>
            </br>
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
                        ">CREAR EGRESO</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('egresos.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('nombre')
                                        has-danger
                                    @enderror">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required value="{{old('nombre')}}">
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('fecha')
                                        has-danger
                                    @enderror">
                                    <label for="fecha">Fecha</label>
                                    <input type="text" name="fecha" id="fecha" class="form-control datepicker" required value="{{old('fecha')}}">
                                    @error('fecha')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('monto')
                                        has-danger
                                    @enderror">
                                    <label for="monto">Monto</label>
                                    <input type="numeric" name="monto" id="monto" class="form-control" required value="{{old('monto')}}">
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
    </section>
</div>
@endsection