<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lastProfiles = User::where('profile_status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.home.index', compact('lastProfiles'));
    }
}
