@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Connexion</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('connexion') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text">
                                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                        <a href="{{ route('register') }}" class="btn btn-link float-right">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
