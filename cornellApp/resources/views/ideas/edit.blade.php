@extends('layouts.layout')
@section('content')

<div class="container-fluid" id="form-user">
    <h1 class="titulo">Editar idea</h1>
    <form action="{{route('ideas.update', ['idea'=>$idea->id] )}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Palabra clave</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="keyword"
                    value="{{ old('idea', $idea->keyword) }}">
                @if ($errors->has('keyword'))
                <span class="text-danger">{{$errors->first('keyword')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Preguntas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="questions"
                    value="{{ old('idea', $idea->questions) }}">
                @if ($errors->has('questions'))
                <span class="text-danger">{{$errors->first('questions')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Ideas principales</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="main_ideas"
                    value="{{ old('idea', $idea->main_ideas) }}">
                @if($errors->has('main_ideas'))
                <span class="text-danger">{{$errors->first('main_ideas')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Puntos importantes</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="important_points"
                    value="{{ old('idea', $idea->important_points) }}">
                @if($errors->has('important_points'))
                <span class="text-danger">{{$errors->first('important_points')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">@lang('header.lang')</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Small select" name="language_id">
                    <option selected disabled>Seleccionar</option>
                    <option value="es">Español</option>
                    <option value="en">Inglés</option>
                    <option value="va">Valencià</option>
                    <option value="fr">Francés</option>
                    <option value="de">Alemán</option>
                </select>
                @if ($errors->has('language_id'))
                <span class="text-danger">Debes seleccionar un campo</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Descripción asociada</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputName3" name="description_id"
                    value="{{ old('idea', $idea->description_id) }}">
                @if ($errors->has('description_id'))
                <span class="text-danger">Debes asignar una descripción</span>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary btn-sm">@lang('buttons.create')</button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">@lang('buttons.return')</a>
        </div>
    </form>

</div>
@endsection