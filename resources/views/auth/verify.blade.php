@extends('layouts.app')

@section('title','Verificacion de Correo')

@section('content')
<br>
<br>
<br>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-2 border-dark">
                <div class="card-header bg-dark" style="color: white" >
                    <h1>

                        <b>

                            {{ __('Verify Your Email Address') }}
                        </b>

                    </h1>
                </div>

                <div class="card-body ">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
