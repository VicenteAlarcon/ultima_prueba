<nav class="col-12" id="contenedor-nav">
    <div class="container-fluid">
        <div class="container" id="button_user">
            @if(auth()->check())
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{route('users.logout')}}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                            sesión</a>
                    </li>
                </ul>
                <p>@lang('header.welcome'){{  auth()->user()->first_name }}</p>
            </div>
            <div class="container" id="language">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="56" fill="#0d6efd" class="bi bi-translate"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z" />
                    <path
                        d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31" />
                </svg>
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" type="button" id="language_select"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('header.lang')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="locale/es">Español</a></li>
                        <li><a class="dropdown-item" href="locale/en">Inglés</a></li>
                        <li><a class="dropdown-item" href="locale/fr">Francés</a></li>
                        <li><a class="dropdown-item" href="locale/de">Alemán</a></li>
                        <li><a class="dropdown-item" href="locale/va">Valenciano</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="logout-form" action="{{ route('users.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endif
    </div>
</nav>