<div class="row d-flex justify-content-center align-items-center gap-2">
    @foreach($profiles as $profile)
        <a class="col-2 card text-bg-dark p-0 border-0" href="{{route('profile.show', $profile->id)}}">
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
    @if(method_exists($profiles,'links') )
        <div class="d-flex justify-content-center">
            {{$profiles->links()}}
        </div>
    @endif
</div>
