@extends('layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Roles</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">Volver</a>
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
                            ">Editar Rol</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group

                                        @error('name')
                                            has-danger
                                        @enderror">
                                        <label for="name">Nombre del Rol</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group
                                        @error('permissions')
                                            has-danger
                                        @enderror">
                                        <label for="permissions">Permisos</label>
                                        <select class="form-control select2" id="permissions" name="permissions[]" multiple="multiple">
                                            @foreach($permissions as $permission)
                                                <option value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('permissions')
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
