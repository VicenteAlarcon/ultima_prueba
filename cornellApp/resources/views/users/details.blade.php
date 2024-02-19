@extends('layouts.layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">User_name</th>
            <th scope="col">Rol</th>
            <th scope="col" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row">{{$user->id}}</th>

            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$rol}}</td>

            <td><a href="{{ route('users.edit', ['user' => $user->id])}}"
                    class="btn btn-outline-success">@lang('buttons.edit')</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">@lang('buttons.delete')</button>
                </form>
            </td>
            <td><a href="{{(route('users.index'))}}" class="btn btn-outline-secondary">@lang('buttons.return')</a></td>

        </tr>


    </tbody>
</table>
@if(Session::has('success'))
<div class="alert alert-success" id="alert" onclick="this.style.display='none'">
    {{ Session::get('success') }}
</div>
@endif

@endsection