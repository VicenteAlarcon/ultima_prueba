@extends('layouts.layout')
@section('content')

<div class="container-fluid" id="form-user">
    <h1 class="titulo">@lang('titles.newTerm')</h1>
    <form action="{{route('terms.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="name">
                @if ($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputName3" name="date">
                @if ($errors->has('date'))
                <span class="text-danger">{{$errors->first('date')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Breve descripción</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="short_description">
                @if($errors->has('short_description'))
                <span class="text-danger">{{$errors->first('short_description')}}</span>
                @endif
            </div>
            <div class="row mb-3">
                <label for="inputName3" class="col-sm-2 col-form-label">@lang('aside_list.types')</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        <option selected disabled>Seleccionar</option>
                        @foreach($types as $type)
                        @if($type->model !=="Usuario")
                        <option value="{{$type->id}}">{{$type->type}}</option>
                        @endif
                        @endforeach

                    </select>
                    @if ($errors->has('type_id'))
                    <span class="text-danger">{{$errors->first('type_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputName3" class="col-sm-2 col-form-label">@lang('header.lang')</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Small select" name="language_id">
                        <option selected disabled="">Seleccionar</option>
                        <option value="es">Español</option>
                        <option value="en">Inglés</option>
                        <option value="va">Valencià</option>
                        <option value="fr">Francés</option>
                        <option value="de">Alemán</option>
                    </select>
                    @if ($errors->has('type_id'))
                    <span class="text-danger">Debes seleccionar un campo</span>
                    @endif
                </div>
            </div>
            <div class="container-fluid">
                <button type="submit" class="btn btn-primary">@lang('buttons.create')</button>
                <a href="{{route('term.index', ['term' => 'terminos'])}}"
                    class="btn btn-outline-secondary">@lang('buttons.return')</a>
            </div>
    </form>

    @if($errors->has('error'))
    <div class="alert alert-danger" id="alert" onclick="this.style.display='none'">
        {{ $errors->first('error') }}
    </div>
    @endif
</div>
@endsection