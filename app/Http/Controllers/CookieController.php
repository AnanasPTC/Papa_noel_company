<?php

namespace App\Http\Controllers;

class CookieController extends Controller
{
    public function index(){
        return view('pages.secret.cookie');
    }
}
