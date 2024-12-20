@extends('layouts.app')

@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-6 d-flex justify-content-end">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{$user->picture}}" height="500" width="500" alt="">
                </div>

            </div>
            <div class="col-6 d-flex justify-content-start align-items-start">
                <div class="d-flex flex-column justify-content-start align-items-start pt-5 mt-5">
                    <h1 class="text-primary">{{$user->firstname}} {{$user->lastname}}, {{\Carbon\Carbon::parse($user->birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}
                        ans</h1>
                    <p class="mt-2">Membre depuis le {{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</p>
                    <div class="">{{$user->firstname}} est fan de
                        @foreach($user->hobbies as $hobby)
                            <span class="badge text-bg-secondary">{{$hobby->name}}</span>
                        @endforeach
                    </div>
                    <div class="mt-2">
                       <p class="fw-bold">Description:</p>
                       <p>Rejoignez dès maintenant Lutins & Compagnie et commencez à écrire votre histoire de Noël avec le binôme parfait !.</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-5">
                        <a class="d-flex justify-content-center align-items-center text-secondary fs-1 coeur" href=""><i class="bi bi-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
