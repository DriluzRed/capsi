@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('ingresos.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-reply"></i></a>
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
                        ">CREAR INGRESO</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('ingresos.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('descripcion')
                                        has-danger
                                    @enderror">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion')
                                    is-invalid
                                @enderror" required value="{{old('descripcion')}}">
                                    @error('descripcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('fecha')
                                        has-danger
                                    @enderror">
                                    <label for="fecha">Fecha</label>
                                    <input type="text" name="fecha" id="fecha" class="form-control datepicker @error('fecha')
                                    is-invalid
                                @enderror" required value="{{old('fecha')}}">
                                    @error('fecha')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('monto')
                                        has-danger
                                    @enderror">
                                    <label for="monto">Monto</label>
                                    <input type="number" name="monto" id="monto" class="form-control @error('monto')
                                    is-invalid
                                @enderror" required value="{{old('monto')}}">
                                    @error('monto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary btn-lg mt-4 mb-4">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection