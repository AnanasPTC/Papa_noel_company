@extends('layouts.app')

@section('content')
    <div class="cookie">
        <h1 class="cookie_title">Lutin Cliqueur</h1>
        <div class="cookie_container">
            <div class="cookie_container_leftside">
                <div id="cookieImgContainer" class="cookie_container_leftside_image">
                    <div class="cookie_container_leftside_image_img"></div>
                    <h2>Clique</h2>
                </div>
            </div>
            <div class="cookie_container_rightside">
                <div class="cookie_container_rightside_score">
                    <span>Vous avez </span>
                    <p id="cookieNumbersContainer">0</p><span> Lutin Biscuit</span>
                </div>
                <div class="cookie_container_rightside_spell">
                    <button id="addCursor" class="btn btn-primary" disabled="disabled">Ajouter un cursor</button>
                    <button id="addRoller" class="btn btn-primary" disabled>Ajouter un rouleaux</button>
                    <button id="addMamie" class="btn btn-primary" disabled>Ajouter une mamie</button>
                    <button id="addUsine" class="btn btn-primary" disabled>Ajouter une usine</button>
                </div>
                <div class="cookie_container_rightside_board">
                    <div class="cookie_container_rightside_board_cursor">
                        <div class="cookie_container_rightside_board_cursor_header">
                            <h2>Vos Cursor</h2>
                            <p id="cursorPercent" class="cookie_container_rightside_board_cursor_header_percent"></p> <span>/s</span>
                        </div>
                        <div id="cursor">

                        </div>
                    </div>

                    <div class="cookie_container_rightside_board_roller">
                        <div class="cookie_container_rightside_board_roller_header">
                            <h2>Vos Rouleaux a patisserie</h2>
                            <p id="rollerPercent" class="cookie_container_rightside_board_roller_header_percent"></p><span>/s</span>
                        </div>
                        <div id="roller">

                        </div>
                    </div>

                    <div class="cookie_container_rightside_board_mamie">
                        <div class="cookie_container_rightside_board_mamie_header">
                            <h2>Vos mamie</h2>
                            <p id="mamiePercent" class="cookie_container_rightside_board_mamie_header_percent"></p>
                            <span>/s</span>
                        </div>
                        <div id="mamie">

                        </div>
                    </div>

                    <div class="cookie_container_rightside_board_usine">
                        <div class="cookie_container_rightside_board_usine_header">
                            <h2>Vos Rouleaux a usine</h2>
                            <p id="usinePercent" class="cookie_container_rightside_board_usine_header_percent"></p>
                            <span>/s</span>
                        </div>
                        <div id="usine">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
