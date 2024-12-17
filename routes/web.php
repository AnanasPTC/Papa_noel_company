<?php

use App\Http\Controllers\HomeController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Auth::routes();

use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'show'])->name('profile.show');
Route::get('/', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('/', [ProfileController::class,'update'])->name('profile.update');
