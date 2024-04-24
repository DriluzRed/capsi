@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>{{ "Iniciar Sesion en Sistema CAPSI" }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ "Correo del Usuario" }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ "Contraseña del Usuario" }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex flex-row justify-content-center gap-2">
                            <button type="submit" class="btn btn-primary pr-3">
                                {{ "Iniciar Sesion"}}
                            </button>
                            
                            <a href="{{ route('register') }}" class="ml-3 btn btn-success">
                                {{ "Registrarse"}}
                            </a>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection