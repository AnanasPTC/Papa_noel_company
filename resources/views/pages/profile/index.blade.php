@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Profil de {{ $user->name }}</h1>
            <p>Voici les informations de votre profil :</p>
            <ul>
                <li>Nom : {{ $user->name }}</li>
                <li>Prénom : {{ $user->first_name }}</li>
                <li>Email : {{ $user->email }}</li>
                <li>Date de naissance : {{ \Carbon\Carbon::parse($user->birthdate)->format('d-m-Y') }}</li>
                <li>Hobbies :
                    <ul>
                        @foreach($user->hobbies as $hobby)
                            <li>{{ $hobby }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>Photo : <img src="{{ $user->photo }}" alt="Photo de profil" class="img-fluid"></li>
            </ul>
            @if (Auth::id() == $user->id)
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
            @endif
        </div>
    </div>
</div>
@endsection
