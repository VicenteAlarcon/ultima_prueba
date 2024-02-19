@extends('layouts.layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Keyword</th>
            <th scope="col">preguntas</th>
            <th scope="col">Ideas principales</th>
            <th scope="col">Puntos importantes</th>
            <th scope="col">Creado el</th>
            <th scope="col">Modificado el</th>
            <th scope="col" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row">{{$idea->id}}</th>

            <td>{{$idea->keyword}}</td>
            <td>{{$idea->questions}}</td>
            <td>{{$idea->main_ideas}}</td>
            <td>{{$idea->important_points}}</td>
            <td>{{$idea->created_at}}</td>
            <td>{{$idea->updated_at}}</td>
            </td>
            <td><a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">@lang('buttons.return')</a>
            </td>
        </tr>


    </tbody>
</table>

@endsection