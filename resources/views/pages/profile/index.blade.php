@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des profils</h1>
            <p>Voici la liste des utilisateurs enregistrés :</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>job</th>
                        <th>Status></th>
                        <th>Date de naissance</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('profile.show', $user->id) }}" class="btn btn-primary">Consulter</a>
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-secondary">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
