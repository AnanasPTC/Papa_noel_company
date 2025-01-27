<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class)->except(['create', 'store']);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/cookie', [CookieController::class, 'index']);

Route::resource('message',Messagecontroller::class);

Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');

Route::get('/notifications', [MessageController::class, 'getNotifications'])->name('notifications.get');
Route::post('/notifications/read', [MessageController::class, 'markAllAsRead'])->name('notifications.read');

Route::post('/notifications/mark-as-read/{id}', [MessageController::class, 'markAsRead'])->name('notifications.markAsRead');

