@extends('layouts.app')

@section('title','Registro de usuario')

@section('content')


<div class="login-box container-flex">
    <img src="/images/logo.png" class="avatar" alt="Avatar Image">
    <h1 ><b>Registro de Usuario</b></h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
      <!-- USERNAME INPUT -->
      <div class="row">
          <div class="col">
      <input id="name" type="text" placeholder="Nombre"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col" >
          <!-- USERNAME INPUT -->
          <input id="last_name" type="text" placeholder="Apellido"  class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
      </div>
        <!--Correo Electronico--->
        <input id="email" type="email" placeholder="Correo Elecronico" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div>
            <select name="department_id" id="department_id" required class="form-control border border-success" >
                <option value="">Seleccionar Su Departamento</option>
                @foreach ($deptos as $depto)
                <option value=" {{ $depto->id }} ">{{ $depto->name }}</option>

               @endforeach
            </select>
        </div>
<br>
      <!-- contraseña  INPUT -->
      <div>
          <input id="contraseña" type="password"  placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>

      <!-- contraseña confirmed INPUT -->
      <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">

      <input type="submit" value="Registrarse">

    </form>
    <div><a href=" {{route('login')}} "><h5><i class="fas fa-sign-in-alt"></i> <b>Inicio de Sesión</b></h5></a></div>
  </div>


</div>


            </div>
        </div>
    </div>
</div>


@endsection
