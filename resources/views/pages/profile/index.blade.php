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
                    <li>
                        <div class="avatar avatar-circle xxl mt-n5 mb-3">
                            <img class="avatar-img rounded-circle border border-white border-3" src="{{ $user->picture }}" alt="Ma Photo de profil" class="img-fluid" src="{{ $user->picture }}"></li>
                    <li>Nom: {{ $user->lastname }}</li>
                    <li>Prénom: {{ $user->firstname }}</li>
                    <li>
                        <div>
                            <div class="form-floating">

                            </div>
                        </div>
                    </li>
                    <li>Job: {{ $user->job }}</li>
                    <li>Email: {{ $user->email }}</li>
                    <li>Date de naissance : {{ \Carbon\Carbon::parse($user->birthdate)->format('d-m-Y') }}</li>
                </ul>
                @if (Auth::id() == $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Se déconnecter</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
