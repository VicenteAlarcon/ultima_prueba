@extends('layouts.layout')
@section('content')
<h1 id="titulos">@lang('titles.termList')</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Título</th>
            <th scope="col" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($terms as $term)
        <tr>
            <th scope="row">{{$term->id}}</th>
            <td>{{$term->name}}</td>
            <td><a href="{{ route('terms.show', ['term'=>$term->id]) }}"
                    class="btn btn-outline-primary">@lang('users.button')</a></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('buttons.options')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item"
                                href="{{route('descriptions.create')}}">@lang('titles.showdesc')</a>
                        </li>
                        <li>
                            <form id="miFormulario" action="{{ route('terms.destroy', ['term'=>$term->id]) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="submitButton"></button>
                            </form>
                            <a class="dropdown-item" href="#"
                                onclick="document.getElementById('submitButton').click();">@lang('buttons.delete')
                            </a>
                        </li>
                </div>
        </tr>
        @endforeach
    </tbody>
</table>

@if($terminos)
<a href="{{route('terms.create')}}" class="btn btn-outline-secondary">@lang('buttons.newTerm')</a>
<!-- Enlace para llamar a la ruta de imprimir pdf-->
<a href="{{route('print-pdf')}}" class="btn btn-outline-secondary">Imprimir PDF</a>
@endif

@if(Session::has('success'))
<div class="alert alert-success" id="alert" onclick="this.style.display='none'">
    {{ Session::get('success') }}
</div>
@endif
@endsection