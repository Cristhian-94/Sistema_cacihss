@extends('layouts.app')

@section('title','Recuperación de Contraseña')

@section('content')

<div class="login-box">
    <img src="/images/logo.png" class="avatar" alt="Avatar Image">
    <h1 style="color: white">Recuperacion de Contraseña</h1>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <br>

      <!-- correo INPUT -->
      <input id="email" type="email" placeholder="Correo Electronico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <br>

      <input type="submit" value="Enviar Link">

    </form>
    <br>
    <a href=" {{route('login')}} "><h4><i class="fas fa-sign-in-alt"></i> <b>Inicio de Sesión</h4></b></a>
    <br>
</div>


@endsection
