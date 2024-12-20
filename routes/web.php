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

Route::resource('message',Messagecontroller::class);

Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');

Route::get('/notifications', [MessageController::class, 'getNotifications'])->name('notifications.get');
Route::post('/notifications/read', [MessageController::class, 'markAllAsRead'])->name('notifications.read');

Route::post('/notifications/mark-as-read/{id}', [MessageController::class, 'markAsRead'])->name('notifications.markAsRead');

