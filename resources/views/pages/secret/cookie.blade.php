@extends('layouts.app')

@section('content')
    <div class="cookie">
        <h1 class="cookie_title">Lutin Cliqueur</h1>
        <div class="cookie_container">
            <div class="cookie_container_leftside">
                <div class="cookie_container_leftside_image">
                    <div class="cookie_container_leftside_image">
                        <img class="cookie_container_leftside_image_img" src="/secret/cookie.png" height="100" width="100" alt="">
                    </div>
                    <div class="cookie_container_leftside_splach">
                        <img class="cookie_container_leftside_splach-big" src="/secret/bigsplach.svg" height="100" width="100" alt="">
                        <img class="cookie_container_leftside_splach-small" src="/secret/lisplach.svg" height="100" width="100" alt="">
                    </div>
                </div>
            </div>
            <div class="cookie_container_right">
                <img class="lilsplach" src="/secret/usine.png" height="100" width="100" alt="">
                <img class="lilsplach" src="/secret/mamie.png" height="100" width="100" alt="">
                <img class="lilsplach" src="/secret/rouleaux.png" height="100" width="100" alt="">
                <img class="lilsplach" src="/secret/cursor.png" height="100" width="100" alt="">
            </div>

        </div>
    </div>
@endsection
