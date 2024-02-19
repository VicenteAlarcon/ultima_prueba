@extends('authenticate.layout')
@section('content')

@include('partials.mini-logo')
<div class="container-fluid" id="form-login">
    <h1 class="titulo">Regístro</h1>
    <form action="{{route('users.register')}}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="first_name">
                @if ($errors->has('first_name'))
                <span class="text-danger">{{$errors->first('first_name')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="last_name">
                @if ($errors->has('last_name'))
                <span class="text-danger">{{$errors->first('last_name')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email">
                @if ($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
                @if ($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmar password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary" id="button-login">Regístrate</button>
            <p>¿Ya eres miembro?<a href="{{route('first') }}">Inicia sesión</a></p>
        </div>
    </form>

</div>
@endsection