@extends('layouts.layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo</th>
            <th scope="col">Modelo</th>
            <th scope="col">Creado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col" colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row">{{$type->id}}</th>

            <td>{{$type->type}}</td>
            <td>{{$type->model}}</td>
            <td>{{$type->created_at}}</td>
            <td>{{$type->updated_at}}</td>
            <td><a href="{{ route('types.edit', ['type' => $type->id])}}"
                    class="btn btn-outline-success">@lang('buttons.edit')</a>
            </td>
            <!-- Condicional para evitar borrar tipos del modelo usuario ya que su eliminación afecta a las tablas relacionadas -->
            @if($type->model == 'Término')
            <td>
                <form action="{{ route('types.destroy', ['type'=>$type->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">@lang('buttons.delete')</button>
                </form>
            </td>
            @if($return)


            <td><a href="{{ route('terms.show', ['term' =>$type->terms->first()->id])}}"
                    class="btn btn-outline-secondary">@lang('buttons.return')</a>
            </td>

            @else
            <td><a href="{{ route('type.index', ['type' => $type='terminos']) }}"
                    class="btn btn-outline-secondary">@lang('buttons.return')</a>
            </td>
            @endif

            @elseif($type->model=='Usuario')
            <td><a href="{{ route('type.index', ['type' => $type='usuarios']) }}"
                    class="btn btn-outline-secondary">@lang('buttons.return')</a>
            </td>
            @endif

        </tr>

    </tbody>
</table>
@if(Session::has('success'))
<div class="alert alert-success" id="alert" onclick="this.style.display='none'">
    {{ Session::get('success') }}
</div>
@endif
@endsection