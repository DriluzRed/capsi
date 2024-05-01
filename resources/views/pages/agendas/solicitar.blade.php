@extends('layouts.app')
@section('content')
<div class="content-header row">
    <div class="col text-center">
        <h3 class="content-header-title mb-0 ">Agendas</h3>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row justify-content-center">
            <div class="col-12 col
            -md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title col text-center
                        font-weight-bold">Agendar Turno</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('agenda.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('descripcion')
                                        has-danger
                                    @enderror">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required value="{{old('descripcion')}}">
                                    @error('descripcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('profesional_id')
                                        has-danger
                                    @enderror">
                                    <label for="profesional_id">Profesional</label>
                                    <select name="profesional_id" id="profesional_id" class="form-control @error('profesional_id') is-invalid @enderror" required>
                                        <option value="">Seleccione un profesional</option>
                                        @foreach($profesionales as $profesional)
                                            <option value="{{ $profesional->id }}">{{ $profesional->nombre_profesional }}</option>
                                        @endforeach
                                    </select>
                                    @error('profesional_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                    @error('turno_id')
                                        has-danger
                                    @enderror">
                                    <label for="turno_id">Turno</label>
                                    <select name="turno_id" id="turno_id" class="form-control @error('turno_id') is-invalid @enderror" required>
                                        <option value="">Seleccione un turno</option>
                                        @foreach($turnos as $turno)
                                            <option value="{{ $turno->id }}">{{ $turno->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('profesional_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group
                                @error('fecha')
                                    has-danger
                                @enderror">
                                    <label for="fecha">Fecha</label>
                                    <input type="text" name="fecha" id="fecha" class="form-control datepicker @error('fecha') is-invalid @enderror" required>
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group
                                    @error('hora')
                                        has-danger
                                    @enderror">
                                    <label for="hora">Hora</label>
                                    <input type="time" name="hora" id="hora" class="form-control timepicker @error('hora') is-invalid @enderror" required>
                                    @error('hora')
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
@endsection
