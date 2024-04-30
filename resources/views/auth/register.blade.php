@extends('layouts.app')

@section('content')
<!-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">{{ "Registrarse en Sistema CAPSI" }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="ci" class="form-label">N° de Documento</label>
                            <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de Usuario</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Direccion Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between gap-2">
                            <a href="{{ route('login') }}" class="btn btn-secondary">
                                Volver al inicio de sesión
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->







<div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2 class="font-weight-bold">Bienvenido!</h2>
                <p>Si ya tienes una cuenta por favor Inicia Sesión con tus datos</p>

                <a href="{{ route('login') }}" class="btn custom-btn2">
                    {{ "Iniciar Sesion"}}
                </a>
            </div>
        </div>
        
        <div class="form-information">
            <div class="form-information-childs">
            <div class="container-title">
                <h2 class="font-weight-bold">Crea una Cuenta</h2>
            </div>

                <form method="POST" action="{{ route('register') }}">
                    
                    @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="ci"><i class="fas fa-regular fa-id-card"></i></span>
                            <input id="ci" type="ci" class="form-control @error('ci') is-invalid @enderror" ci="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus placeholder="N° de Documento">
                            @error('ci')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username"><i class="fas fa-solid fa-user"></i></span>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre de Usuario">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="mail"><i class="fas fa-solid fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="mail"><i class="fas fa-solid fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="mail"><i class="fas fa-solid fa-lock"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                        </div>

                    
                        <div class="footer">
                            <button type="submit" class="btn custom-btn1 pr-3">
                                {{ "Registrarse"}}
                            </button>
                        </div>
                
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-styles')
    <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
@endsection