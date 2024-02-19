@extends('layouts.layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Título</th>
            <th scope="col">Apuntes</th>
            <th scope="col">Resumen</th>
            <th scope="col">Objetivos</th>
            <th scope="col">ID Término</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Idioma</th>
            <th scope="col" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row">{{$description->id}}</th>

            <td>{{$description->title}}</td>
            <td>{{$description->notes}}</td>
            <td>{{$description->summary}}</td>
            <td>{{$description->objectives}}</td>
            <td>{{$description->term_id}}</td>
            <td>{{$description->user_id}}</td>
            <td>{{$description->language_id}}</td>
            </td>
            <td><a href="{{ route('descriptions.edit', ['description' => $description->id]) }}"
                    class="btn btn-outline-primary btn-sm">Editar</a></td>
            <td>
                <form id="miFormulario" action="{{ route('descriptions.destroy', ['description'=>$description->id]) }}"
                    method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="submitButton"></button>
                </form>
                <a class="btn btn-outline-danger btn-sm" href="#"
                    onclick="document.getElementById('submitButton').click();">@lang('buttons.delete')
                </a>
            <td><a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">@lang('buttons.return')</a>
            </td>
        </tr>


    </tbody>
</table>

@endsection