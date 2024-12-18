<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Auth::routes();

use App\Http\Controllers\ProfileController;

use function Laravel\Prompts\search;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile',ProfileController::class)->except(['create', 'store']);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'findByFilter'])->name('search.filter');



