@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4">Près à rejoindre les lutins</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input id="firstname" type="text"
                                               class="form-control @error('firstname') is-invalid @enderror"
                                               name="firstname" value="{{ old('firstname') }}" required
                                               autocomplete="firstname" autofocus>
                                        <label for="firstname">Prenom</label>
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input id="lastname" type="text"
                                               class="form-control @error('lastname') is-invalid @enderror"
                                               name="lastname" value="{{ old('lastname') }}" required
                                               autocomplete="lastname" autofocus>
                                        <label for="lastname">Nom</label>
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 d-flex align-items-center justify-content-center">
                                <ul class="list-group col-8 p-0">
                                    <li class="list-group-item "  data-bs-toggle="collapse" href="#collapseHobbies"
                                        role="button" aria-expanded="false"
                                        aria-controls="collapseHobbies">
                                        Choisi tes hobbies
                                    </li>
                                    <li class="list-group-item  collapse"  id="collapseHobbies">
                                        <div class="row p-3">
                                            @foreach($hobbies as $hobby)
                                                <div class="form-check col-6">
                                                    <input class="form-check-input" id="flexCheck{{ $hobby->id }}" type="checkbox" value="{{ $hobby->id }}" name="hobbies[]">
                                                    <label class="form-check-label" for="flexCheck{{ $hobby->id }}">
                                                        {{ $hobby->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="row mb-3 d-flex justify-content-center align-items-center">
                                <div class="col-8">
                                    <div class="form-floating">
                                        <input id="job" type="text"
                                               class="form-control @error('job') is-invalid @enderror"
                                               name="job" value="{{ old('job') }}" required
                                               autocomplete="job" autofocus>
                                        <label for="job">Poste</label>
                                        @error('job')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="front_cover">Ma photo</label>
                                    <input type="file" name="picture" id="picture"
                                           placeholder="Ma Photo"
                                           class="form-control">
                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="form-floating my-2">
                                        <input class="form-control" id="birthdate" type="date"
                                               name="birthdate"
                                               placeholder="Traducteur">
                                        <label for="birthdate" class="form-label">Naissance</label>
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required
                                               autocomplete="email" autofocus>
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required
                                               autocomplete="password" autofocus>
                                        <label for="password">Mot De Passe</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating">
                                        <input id="password_confirmation" type="password"
                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" required
                                               autocomplete="password_confirmation" autofocus>
                                        <label for="password_confirmation">Confirme ton mot de passe</label>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Les Rejoindres
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
