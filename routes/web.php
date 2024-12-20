<?php

use function Laravel\Prompts\search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Auth::routes();

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class)->except(['create', 'store']);

// Recherche
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
<<<<<<< HEAD
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
=======

Route::resource('message',Messagecontroller::class);

Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');

Route::get('/notifications', [MessageController::class, 'getNotifications'])->name('notifications.get');
Route::post('/notifications/read', [MessageController::class, 'markAllAsRead'])->name('notifications.read');

Route::post('/notifications/mark-as-read/{id}', [MessageController::class, 'markAsRead'])->name('notifications.markAsRead');
>>>>>>> 8cfd7bcb1a0bcd146d96facb101e80e6dde7aabe

