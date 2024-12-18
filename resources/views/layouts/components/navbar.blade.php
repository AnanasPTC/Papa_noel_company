<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0 px-3">
    <a class="navbar-brand fw-bold fs-1 text-primary" href="{{ url('/') }}">
        {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            @guest
            @else
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Mon Profile') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/message">{{ __('Mes Messages') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Mes Recherche</a>
                </li>
            @endguest
        </ul>
        <ul class="navbar-nav ms-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Ce Deconnecter
                        </a>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
