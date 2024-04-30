@extends('layouts.app')

@section('content')
<!-- <div class="d-flex align-items-center justify-content-center vh-100">
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
</div> -->





<div class="container-form login">
        <div class="information">
            <div class="info-childs">
                <h2 class="font-weight-bold">Bienvenido Nuevamente!!</h2>
                <p>Si aún no tienes una cuenta por favor registrese aquí</p>
                <a href="{{ route('register') }}" class="ml-3 btn custom-btn2">
                     {{ "Registrarse"}}
                </a>
            </div>
        </div>

        <div class="form-information">
            <div class="form-information-childs">
                <div class="container-title">
                    <h2 class="font-weight-bold">Inicia Sesión</h2>
                </div>
                
                          
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
                    

                        <div class="footer">
                            <button type="submit" class="btn custom-btn1 pr-3">
                                {{ "Iniciar Sesion"}}
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
