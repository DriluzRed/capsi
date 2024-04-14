@extends('layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Permisos</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-sm">Volver</a>
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
                            ">Editar Permiso</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group
                                        @error('name')
                                            has-danger
                                        @enderror">
                                        <label for="name">Nombre del Permiso</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
                                        @error('name')
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