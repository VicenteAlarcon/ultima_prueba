@extends('layouts.layout')
@section('content')
<div class="container-fluid" id="form-user">
    <h1 class="titulo">Editar Término</h1>
    <form action="{{route('terms.update', ['term' => $term->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="name"
                    value="{{ old('term', $term->name) }}">
                @if ($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputName3" name="date"
                    value="{{ old('term', $term->date) }}">
                @if ($errors->has('date'))
                <span class="text-danger">{{$errors->first('date')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Breve descripción</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="short_description"
                    value="{{ old('term', $term->short_description) }}">
                @if ($errors->has('short_description'))
                <span class="text-danger">{{$errors->first('short_description')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Tipo</label>

            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected disabled>Seleccionar</option>
                    <option value="3">DWES</option>
                    <option value="4">DIW</option>
                    <option value="5">DAW</option>
                </select>
                @if ($errors->has('type_id'))
                <span class="text-danger">{{$errors->first('type_id')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Idioma</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="language_id"
                    value="{{ old('term', $term->language_id) }}">
                @if ($errors->has('language_id'))
                <span class="text-danger">{{$errors->first('language_id')}}</span>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary">@lang('buttons.update')</button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">@lang('buttons.return')</a>
        </div>
    </form>

</div>
@endsection