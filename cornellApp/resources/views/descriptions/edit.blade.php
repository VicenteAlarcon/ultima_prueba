@extends('layouts.layout')
@section('content')
<div class="container-fluid" id="form-user">
    <h1 class="titulo">Nueva Descripción</h1>
    <form action="{{route('descriptions.update', ['description' => $description->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="title"
                    value="{{ old('description', $description->title) }}">
                @if ($errors->has('title'))
                <span class="text-danger">{{$errors->first('title')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Apuntes</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="notes"
                    value="{{ old('description', $description->notes) }}">
                @if ($errors->has('notes'))
                <span class="text-danger">{{$errors->first('notes')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Resumen</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="summary"
                    value="{{ old('description', $description->summary) }}">
                @if($errors->has('summary'))
                <span class="text-danger">{{$errors->first('summary')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Objetivos</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="objectives"
                    value="{{ old('description', $description->objectives) }}">
                @if($errors->has('objectives'))
                <span class="text-danger">{{$errors->first('objectives')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">@lang('header.lang')</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Small select" name="language_id"
                    value="{{ old('description', $description->language_id) }}">
                    <option selected disabled="">Seleccionar</option>
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
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary">@lang('buttons.update')</button>
            <a href="{{ route('term.index', ['term' => 'terminos'])}}"
                class="btn btn-outline-secondary">@lang('buttons.return')</a>
        </div>
    </form>
    @if(Session::has('success'))
    <div class="alert alert-success" id="alert" onclick="this.style.display='none'">
        {{ Session::get('success') }}
    </div>
    @endif
</div>
@endsection