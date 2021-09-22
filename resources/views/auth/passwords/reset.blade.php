@extends('layouts.app')

@section('title','Cambio de Contraseña')

@section('content')
<div class="login-box">
      <img src="/images/logo.png" class="avatar" alt="Avatar Image">
      <h1 style="color: white" >Cambio de Contraseña</h1>
       <form method="POST" action="{{ route('password.update') }}">
        @csrf
          <input type="hidden" name="token" value="{{ $token }}">
        <!-- USERNAME INPUT -->

        <br>
        <div >
            <input id="email" placeholder="Correo Electronico" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- PASSWORD INPUT -->
        <div >
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nueva Contraseña">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña" >
        </div>


        <input type="submit" value="{{ __('Reset Password') }}">

      </form>
      <div><a href=" {{route('login')}} "><h5><i class="fas fa-sign-in-alt"></i> <b>Inicio de Sesión</b></h5></a></div>
    </div>

    @endsection
