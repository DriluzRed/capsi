@extends('layouts.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Departamentos</h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a href="{{ route('departamentos.index') }}" class="btn btn-primary btn-sm">Volver</a>
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
                        ">Crear Departamento</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('departamentos.store') }}" method="POST">
                                @csrf
                                <div class="form-group
                                    @error('nombre')
                                        has-danger
                                    @enderror">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group

                                    @error('pais_id')
                                        has-danger
                                    @enderror">
                                    <label for="pais_id">Pais</label>
                                    <select name="pais" id="pais" class="form-control" required>
                                        <option value="">Seleccione un pais</option>
                                        @foreach($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('pais_id')
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