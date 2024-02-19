@extends('layouts.layout')
@section('content')
<div class="container-fluid" id="form-user">
    <h1 class="titulo">@lang('titles.createType')</h1>
    <form action="{{route('types.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="type" value="{{ old('type') }}">
                @if ($errors->has('type'))
                <span class="text-danger">{{$errors->first('type')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="model">
                    <option selected disabled="">Seleccionar</option>
                    <option value="Usuario">Usuario</option>
                    <option value="Término">Término</option>
                </select>
                @if ($errors->has('model'))
                <span class="text-danger">Debes seleccionar un campo</span>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <button type="submit" class="btn btn-primary">@lang('buttons.create')</button>
            <a href="{{(route('type.index', ['type' =>'tipos']))}}"
                class="btn btn-outline-secondary">@lang('buttons.return')</a>
        </div>
    </form>

</div>
@endsection