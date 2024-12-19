<?php

use function Laravel\Prompts\search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;

Auth::routes();

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile',ProfileController::class)->except(['create', 'store']);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'findByFilter'])->name('search.filter');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class,'store'])->name('profile.store');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
Route::put('/user/profile', [ProfileController::class, 'updateProfile']);
Route::patch('/users/{id}', [ProfileController::class, 'updateStatus'])->name('users.updateStatus');
Route::patch('/users/{id}', [ProfileController::class, 'update'])->name('users');
Route::get('/users/{id}/edit', [ProfileController::class, 'editProfile'])->name('users.editProfile');
Route::update('user/profile', [ProfileController::class, 'update'])->name('profile.update');

