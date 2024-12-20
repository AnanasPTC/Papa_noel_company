@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-between mb-4 mx-4">
            <h1 class="col-6 p-0">Trouve le Lutin de tes rêves</h1>
            <form class="col-6 d-flex justify-content-center gap-2 p-0 " method="GET"
                  action="{{route('search.index')}}">
                @csrf
                @method('GET')
                <div class="d-flex justify-content-end align-items-center">
                    <div class="form-floating">
                        <select class="form-select" name="filter" aria-label="Default select example">
                            <option value=" " selected>Trier par</option>
                            <option value="age_asc">Age croissants</option>
                            <option value="age_desc">Age décroissants</option>
                            <option value="created_asc">Plus récents</option>
                        </select>
                    </div>
                    <div class="form-floating col-3">
                        <input id="min_age" type="number" class="form-control" name="min_age" @isset($min_age) value="{{ $min_age }}" @endisset
                        autocomplete="age" >
                        <label for="min_age">De Age</label>
                    </div>
                    <div class="form-floating col-3">
                        <input id="max_age" type="number" class="form-control" name="max_age" @isset($max_age) value="{{ $max_age }}" @endisset
                        autocomplete="max_age" >
                        <label for="max_age">A Age</label>
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

        @include('pages.profile.components.browser',['profiles' => $profiles])
    </div>
@endsection
