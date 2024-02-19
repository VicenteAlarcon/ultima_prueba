@extends('layouts.layout')
@section('content')

@if($type=='usuarios')
<h1 id="titulos">@lang('titles.usersList')</h1>
<a href="{{route('types.create')}}" class="btn btn-outline-secondary" id="types_btn">@lang('buttons.create')</a>
@elseif($type=='terminos')
<h1 id="titulos">@lang('titles.termList')</h1>
<a href="{{route('types.create')}}" class="btn btn-outline-secondary" id="types_btn">@lang('buttons.create')</a>
@else
<h1 id="titulos">@lang('titles.typeList')</h1>
@endif
<table class="table" id="tab">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <th scope="row">{{$type->id}}</th>
            <td>{{$type->type}}</td>

            <td><a href="{{ route('types.show', ['type'=>$type->id]) }}"
                    class="btn btn-outline-primary">@lang('users.button')</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@if(Session::has('success'))
<div class="alert alert-success" id="alert" onclick="this.style.display='none'">
    {{ Session::get('success') }}
</div>
@endif
@endsection