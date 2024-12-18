<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        return view('pages.search.index');
    }

    public function findByFilter(Request $request)
    {

    }

}
