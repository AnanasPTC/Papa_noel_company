<?php

use function Laravel\Prompts\search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class)->except(['create', 'store']);

// Recherche
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'findByFilter'])->name('search.filter');

// Profiles
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class,'store'])->name('profile.store');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Utilisateurs
Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
Route::patch('/users/{id}/status', [ProfileController::class, 'updateStatus'])->name('users.updateStatus');
Route::post('/users/{id}/edit', [ProfileController::class, 'editProfile'])->name('users.editProfile');
Route::get('/user/profile', [ProfileController::class, 'profile'])->name('user.profile');
Route::put('/user/profile', [ProfileController::class, 'update'])->name('user.update');

