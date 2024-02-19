@extends('layouts.layout')
@section('content')
<div class="container" id="cajaCornell">
    <div class="row">
        <section>
            <div class="col-12" id="terms_header">
                <div class="container" id="header_contain">
                    <h5 class="date">{{ \Carbon\Carbon::parse($term->date)->format('d-m-Y') }}</h5>
                    <h1> {{$term->name}}</h1>
                    <!--
                        Variable return enviada en enlace para poder redireccionar correctamente desde la vista types
                      -->
                    <a
                        href="{{ route('types.show', ['type'=>$term->type_id, 'return' => true]) }}">@lang('buttons.termtype')</a>
                </div>
                <div class="container" id="button_edit">
                    <a href="{{ route('terms.edit', ['term' => $term->id])}}"
                        class="btn btn-outline-success">@lang('buttons.edit')</a>
                </div>
            </div>
        </section>
        <div class="col-3" id="ideas_aside">
            <h2>@lang('titles.ideasQuestions')</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Palabra clave</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($term->descriptions as $description)
                    @foreach ($description->ideas as $idea)
                    <tr>
                        <td scope="row">{{$idea->id}}</td>
                        <td>{{ $idea->keyword }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    @lang('buttons.options')
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item"
                                            href="{{route('ideas.show', ['idea'=>$idea->id])}}">@lang('users.button')</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{route('ideas.edit', ['idea'=>$idea->id])}}">@lang('buttons.edit')</a>
                                    </li>
                                    <li>
                                        <form id="miFormulario"
                                            action="{{ route('ideas.destroy', ['idea'=>$idea->id]) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="submitButton"></button>
                                        </form>
                                        <a class="dropdown-item" href="#"
                                            onclick="document.getElementById('submitButton').click();">@lang('buttons.delete')
                                        </a>
                                    </li>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @endforeach
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-outline-secondary" href="{{route('ideas.create')}}">@lang('buttons.create')</a>

        </div>
        <div class="col-9" id="main_terms">

            <section>
                <h4>@lang('titles.notes')</h4>
                @foreach ($term->descriptions as $description)
                <ul>

                    <li> {{ $description->notes }}</li>
                </ul>

                @endforeach
                <div class="container" id="cont_valoraciones">
                    <h5>@lang('titles.evaluations')</h5>
                    @foreach($term->descriptions as $description)
                    @foreach($description->users as $user)
                    {{ $user->pivot->rating }}
                    @endforeach
                    @endforeach
                    <a href="{{route('rating.form')}}" class="btn btn-outline-secondary btn-sm"
                        id="btn_rating">@lang('buttons.evaluate')</a>
                </div>
                <div class="dropdown" id="term_buttons">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('buttons.options')
                    </button>
                    @if(isset($description))
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item"
                                href="{{route('descriptions.show', ['description' => $description->id])}}"
                                class="btn btn-outline-secondary">@lang('titles.newdesc')</a></li>
                        <li><a class="dropdown-item" href="{{route('descriptions.create')}}"
                                class="btn btn-outline-secondary">@lang('titles.showdesc')</a></li>
                        <li><a class="dropdown-item" href=" {{route('term.index', ['term' => 'terminos'])}}"
                                class="btn btn-outline-secondary">@lang('buttons.return')</a></li>
                    </ul>
                </div>
        </div>
        </section>
    </div>
    <section>
        <div class="col-6" id="summary">
            <h4>@lang('titles.summary')</h4>
            @foreach ($term->descriptions as $description)
            <ul>
                <li>{{ $description->summary }}</li>
            </ul>
            @endforeach
        </div>
    </section>

    @if(Session::has('success'))
    <div class="alert alert-success" id="alert" onclick="this.style.display='none'">
        {{ Session::get('success') }}
    </div>
    @endif
    @else
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" class="btn btn-outline-secondary">Ver descripción</a></li>
        <li><a class="dropdown-item" href="{{route('descriptions.create')}}" class="btn btn-outline-secondary">Nueva
                descripción</a></li>
        <li><a class="dropdown-item" href=" {{route('term.index', ['term' => 'terminos'])}}"
                class="btn btn-outline-secondary">@lang('buttons.return')</a></li>
    </ul>
</div>
</div>
</section>
</div>
<section>
    <div class="col-6" id="summary">
        <h4>Resumen</h4>

        <div class="alert alert-success" id="alert" onclick="this.style.display='none'">
            La descripción está vacia
        </div>
    </div>
</section>
@endif
</div>




@endsection