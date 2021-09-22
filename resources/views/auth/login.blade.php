@extends('layouts.app')

@section('title','Inicio de Sesión')

@section('content')

<div class="container-fluid">
    <div class="login-box">
        <img src="images/logo.png" class="avatar" alt="Avatar Image">
        <h1 ><b>Inicio de Sesión</b></h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <!-- USERNAME INPUT -->

          <input type="text" placeholder="Correo Electronico"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  >
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
          <!-- PASSWORD INPUT -->
          <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <input type="submit" value="Iniciar Sesión">
            <div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        <h3>¿Olvidaste tu Contraseña?</h3>
                        </a>
                    @endif
            </div>
    <br>
        <div>
        <a href="{{route('Register_')}}"><h6>No tiene una Cuenta?   <i class="fas fa-user"></i> <b>Registrate</b></h6></a>
        </div>
        </form>
    </div>
</div>

@endsection
