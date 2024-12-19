@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-between mb-4 mx-4">
            <h1 class="col-6 p-0">Trouve le Lutin de tes réves</h1>
            <form class="col-6 d-flex justify-content-center gap-2 p-0 " method="GET"
                  action="{{route('search.index')}}">
                @csrf
                @method('GET')
                <div class="d-flex justify-content-end align-items-center">
                    <span class="mx-2">De</span>
                    <div class="form-floating col-3">
                        <input id="min_age" type="number" class="form-control" name="min_age" @isset($min_age) value="{{ $min_age }}" @endisset
                        autocomplete="age" autofocus>
                        <label for="min_age">Age</label>
                    </div>
                    <span class="mx-2">A</span>
                    <div class="form-floating col-3">
                        <input id="max_age" type="number" class="form-control" name="max_age" @isset($max_age) value="{{ $max_age }}" @endisset
                        autocomplete="max_age" autofocus>
                        <label for="max_age">Age</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating">
                        <select class="form-select" name="hobby" aria-label="Default select example">
                            <option value=" " selected>Les hobbies</option>
                            @foreach($hobbies as $hobby)
                                <option value="{{$hobby->id}}">{{$hobby->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Afficher</button>
                <a href="{{route('search.index')}}"  class="btn btn-secondary d-flex justify-content-center align-items-center">réinitialiser</a>
            </form>
        </div>

        <div class="row d-flex justify-content-center align-items-center gap-2">
            @foreach($profiles as $profile)
                <a class="col-2 card text-bg-dark p-0 border-0" href="{{--{{route('profile.show', $profile->id)}--}}}">
                    <img src="{{$profile->picture}}" class="card-img" alt="...">
                    <div class="card-img-overlay p">
                        <h5 class="card-title">{{$profile->lastname}} {{$profile->firstname}}
                            <small>{{\Carbon\Carbon::parse($profile->birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}
                                ans</small></h5>
                        @isset($profile->hobbies[0])
                            <p class="card-text">{{$profile->hobbies[0]->name}}</p>
                        @endisset
                    </div>
                </a>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$profiles->links()}}
            </div>
        </div>
    </div>
@endsection
