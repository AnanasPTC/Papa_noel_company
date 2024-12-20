@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4">Change ton Profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input id="firstname" type="text"
                                               class="form-control @error('firstname') is-invalid @enderror"
                                               name="firstname" value="{{ $user->firstname }}" required
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
                                               name="lastname" value="{{ $user->lastname }}" required
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
                                                    <input class="form-check-input"
                                                           id="flexCheck{{ $hobby->id }}"
                                                           type="checkbox"
                                                           value="{{ $hobby->id }}"
                                                           name="hobbies[]"
                                                           @if($user->hobbies->contains($hobby->id)) checked @endif
                                                    >
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
                                               name="job" value="{{ $user->job }}" required
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
                                               value="{{$user->birthdate }}"
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
                            <button type="submit" class="btn btn-primary w-100">
                                Enregister les changements
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
