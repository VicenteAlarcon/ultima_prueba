@extends('layouts.layout')
@section('content')


<h1 id="titulos">@lang('users.title')</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="3">Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->first_name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{ route('users.show', ['user'=>$user->id]) }}"
                    class="btn btn-outline-primary">@lang('users.button')</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{route('users.create')}}" class="btn btn-outline-secondary">@lang('users.newUser')</a>




@if(Session::has('success'))
<div class="alert alert-success" id="alert" onclick="this.style.display='none'">
    {{ Session::get('success') }}
</div>
@endif
@endsection