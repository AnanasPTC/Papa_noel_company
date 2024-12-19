<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm p-0 px-3">
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
                    <a class="nav-link" href="{{route('search.index')}}">Mes Recherche</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle position-relative" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        🔔 
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                        {{ isset($unreadNotifications) ? $unreadNotifications->count() : 0 }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        @if (isset($unreadNotifications) && $unreadNotifications->isNotEmpty())
                            @foreach ($unreadNotifications as $notification)
                                <li class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $notification->sender->firstname }} {{ $notification->sender->lastname }}</strong>
                                        vous a envoyé un message : 
                                        "{{ Str::limit($notification->content, 20, '...') }}"
                                    </div>
                                </li>
                            @endforeach
                            <form action="{{ route('notifications.read') }}" method="POST" class="text-center mt-2">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">
                                    ✔️ Tout marquer comme lu
                                </button>
                            </form>
                        @else
                            <li class="dropdown-item text-center">Aucune notification</li>
                        @endif
                    </ul>
                </li>
            @endguest
        </ul>
        <ul class="navbar-nav ms-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ce connecter') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
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
