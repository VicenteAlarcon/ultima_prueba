@extends('authenticate.layout')
@section('content')

@include('partials.mini-logo')
<div class="container" id="form-login">

    <h1 class="titulo">Login</h1>
    <form action="{{route('users.login')}}" method="post" name="form_login">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="button-login">Login</button>
        <p>¿No tienes una cuenta?<a href="{{route('register.form') }}"> Regístrate</a></p>
        <p>O accede con tu cuenta de<a href="/login-google">Google</a></p>
    </form>
    @if(session('success'))
    <h2 class="login-error" id="register_exit">{{session('success')}}</h2>
    @endif
    @if ($errors)
    <span class="login-error">{{ $errors->first() }}</span>
    @endif
</div>
@endsection