@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h1>Bienvenue les lutins!</h1>
                <p>Vous êtes sur le site officiel des rencontres entre lutins de la Papa Noel Compagny.</p>
                <h2>Page profile de {{ $user->name }}</h2>
                <p>Voici les informations de votre profil:</p>
                <ul>
                    <li>Nom: {{ $user->lastname }}</li>
                    <li>Prénom: {{ $user->firstname }}</li>
                    <li>Email: {{ $user->email }}</li>
                    <li>Date de naissance: {{ $user->birthdate->format('d-m-Y') }}</li>
                    <li>Photo: <img src="{{ $user->picture }}" alt="Photo de profil" class="img-fluid"></li>
                </ul>
                @if (Auth::id() == $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
