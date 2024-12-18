<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Auth::routes();

use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile',ProfileController::class)->except(['create', 'store']);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'findByFilter'])->name('search.filter');

Route::resource('message',Messagecontroller::class);

Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');
