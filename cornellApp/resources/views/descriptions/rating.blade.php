@extends('layouts.layout')
@section('content')
<div class="container-fluid" id="form-user">
    <h1 class="titulo">@lang('titles.newValoration')</h1>
    <form action="{{route('rating.attach')}}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Nombre usuario</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Small select" name="user_id">
                    <option selected disabled="">Seleccionar</option>
                    @foreach($users as $user)

                    <option value="{{$user->id}}"> {{$user->first_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                <span class="text-danger">Debes seleccionar un campo</span>
                @endif
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Titulo descripción</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Small select" name="description_id">
                    <option selected="">Seleccionar</option>
                    @foreach($descriptions as $description)

                    <option value="{{$description->id}}">{{$description->title}}</option>
                    @endforeach
                </select>
                @if ($errors->has('description_id'))
                <span class="text-danger">Debes seleccionar un campo</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Valoración</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Small select" name="rating">
                    <option selected="">Seleccionar</option>
                    <option value="Mejor">Mejor</option>
                    <option value="Primera">Primera</option>
                    <option value="Segunda">Segunda</option>
                    <option value="Tercera">Tercera</option>
                </select>
                @if ($errors->has('rating'))
                <span class="text-danger">Debes seleccionar un campo</span>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary">Adjuntar</button>


            <a href="{{ route('term.index', ['term' => 'terminos'])}}"
                class="btn btn-outline-secondary">@lang('buttons.return')</a>
        </div>

    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</div>
@endsection