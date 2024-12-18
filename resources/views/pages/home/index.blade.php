@extends('layouts.app')

@section('content')
    <div class="container" style="height: 80vh">
        <div class="row d-flex justify-content-center align-items-center" style="height: 80vh">
            @guest
                <div class="card col-6 border-0">
                    <div class="card-body">
                        <h2 class="card-title fw-bold fs-1">Trouvez votre compagnon pour l’atelier du Père Noël !</h2>
                        <p class="card-text">Bienvenue sur Elf-Match, le site magique où chaque lutin trouve son
                            partenaire idéal pour rejoindre l’atelier du Père Noël ! Que vous soyez un as de l’emballage
                            de cadeaux, un expert des jouets en bois ou simplement un petit lutin en quête d’une
                            nouvelle amitié festive, notre plateforme est là pour vous aider. Remplissez votre profil,
                            indiquez vos talents de lutin et laissez la magie de Noël faire le reste. Ensemble, rendons
                            chaque jour à l’atelier encore plus joyeux et chaleureux ! 🎄✨</p>
                        <button class="btn btn-primary w-100"> Vient les Rejoindres</button>
                    </div>
                </div>
            @else

            @endguest
        </div>
    </div>
@endsection
