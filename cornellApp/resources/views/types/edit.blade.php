@extends('layouts.layout')
@section('content')
<div class="container-fluid" id="form-user">
    <h1 class="titulo">@lang('titles.editType')</h1>
    <form action="{{route('types.update', ['type' => $type->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="type"
                    value="{{ old('type', $type->type) }}">
                @if ($errors->has('type'))
                <span class="text-danger">{{$errors->first('type')}}</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputName3" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName3" name="model"
                    value="{{ old('type', $type->model) }}">
                @if ($errors->has('model'))
                <span class="text-danger">{{$errors->first('model')}}</span>
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