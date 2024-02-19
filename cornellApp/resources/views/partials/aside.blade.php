<div class="container-fluid" id="aside">
    <nav class="nav flex-column">
        <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">@lang('aside_list.principal')</a>
        <a class="nav-link" href="{{route('users.index')}}">@lang('aside_list.users')</a>

        <div class="dropdown" id="link">
            <a href="{{route('type.index', ['type' => 'tipos'])}}">@lang('aside_list.types')</a>
            <a class=" dropdown-toggle" href="" role="button" id="enlaceDesplegable" data-bs-toggle="dropdown"
                aria-expanded="false">

            </a>
            <ul class="dropdown-menu" aria-labelledby="enlaceDesplegable">
                <li><a class="dropdown-item"
                        href="{{route('type.index', ['type' => 'terminos'])}}">@lang('aside_list.terms')</a></li>
                <li><a class="dropdown-item"
                        href="{{route('type.index', ['type' => 'usuarios'])}}">@lang('aside_list.users')</a></li>
            </ul>
        </div>
        <div class="dropdown" id="link">
            <a href="{{route('term.index', ['term' => 'terminos'])}}">@lang('aside_list.terms')</a>
            <a class=" dropdown-toggle" href="#" role="button" id="enlaceDesplegable" data-bs-toggle="dropdown"
                aria-expanded="false">

            </a>
            <ul class="dropdown-menu" aria-labelledby="enlaceDesplegable">
                <li><a class="dropdown-item"
                        href="{{route('term.index', ['term' => 'propios'])}}">@lang('aside_list.own')</a></li>
                <li><a class="dropdown-item"
                        href="{{route('term.index', ['term' => 'otros'])}}">@lang('aside_list.others')</a></li>
            </ul>
        </div>

    </nav>
</div>