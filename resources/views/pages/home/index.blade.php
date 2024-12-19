@extends('layouts.app')

@section('content')
    <div class="container-fluid home p-0">
        @guest
            <div class="home_background p-0">
                <video class="home_background_video" loop="true" muted autoplay>
                    <source src="Fond.mp4" type="video/mp4"/>
                </video>
            </div>
            <div class="home_text bg-transparent card  border-0">
                <div class="card-body">
                    <h2 class="card-title fw-bold fs-1">Trouvez votre compagnon ideal</h2>
                    <h2 class="card-title fw-bold fs-1 d-flex align-items-center justify-content-end">pour l’atelier du
                        Père Noël !</h2>
                    <p class="card-text">Bienvenue sur Elf-Match, le site magique où chaque lutin trouve son
                        partenaire idéal pour rejoindre l’atelier du Père Noël ! Que vous soyez un as de l’emballage
                        de cadeaux, un expert des jouets en bois ou simplement un petit lutin en quête d’une
                        nouvelle amitié festive, notre plateforme est là pour vous aider. Remplissez votre profil,
                        indiquez vos talents de lutin et laissez la magie de Noël faire le reste. Ensemble, rendons
                        chaque jour à l’atelier encore plus joyeux et chaleureux ! 🎄✨</p>
                    @if (Route::has('register'))
                        <a class="btn btn-secondary w-100" href="{{ route('register') }}">Vient les
                            Rejoindres</a>
                    @endif
                </div>
            </div>
        @else
            <div class="container">
                <div class="row my-5">
                    <h2>Les Derniers</h2>
                    @include('pages.profile.components.browser', ['profiles' => $lastProfiles])
                </div>
                <div class="row my-5">
                    <h2>Les plus appréciés</h2>
                    @include('pages.profile.components.browser', ['profiles' => $lastProfiles])
                </div>
            </div>
        @endguest
    </div>
@endsection
