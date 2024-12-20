@extends('layouts.app')

@section('content')
<div class="page-content page-container vertical-center" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xxl-6 col-xxl-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card text-center text-black">
                                <div class="m-b-25">
                                    <h1>Profil de {{ $user->firstname }}</h1>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-success active">
                                          <input type="checkbox" checked>Actif
                                        </label>
                                        <label class="btn btn-danger">
                                          <input type="checkbox">Non Actif
                                        </label>
                                    </div>
                                    <style> ul.nolist { list-style-type: none;
                                        padding-left: 0;
                                        }
                                    </style>
                                    <ul class="nolist">
                                        <li><img src="/storage/uploads/{{ $user->picture }}" alt="Photo de profil" class="img-fluid"></li>
                                        <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <ul class="nolist">
                                    <li>Nom : {{ $user->lastname }}</li>
                                    <li>Prénom : {{ $user->firstname }}</li>
                                    <li>Email : {{ $user->email }}</li>
                                    <li>Date de naissance : {{ \Carbon\Carbon::parse($user->birthdate)->format('d-m-Y') }}</li>
                                    <li>
                                        <div class="form-floating">
                                            <select class="form-select" name="hobby" aria-label="Default select example">
                                                <option value="" selected>Les hobbies</option>
                                                @foreach($user->hobbies as $hobby)
                                                    <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                                @if (Auth::id() == $user->id)
                                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
