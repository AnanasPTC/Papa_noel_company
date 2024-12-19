@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le profil</h1>
    <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="lastname">Prénom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Date de naissance</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="img_path">Photo de profil</label>
            <input type="file" class="form-control" id="img_path" name="img_path">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Laissez vide pour conserver le mot de passe actuel.</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
