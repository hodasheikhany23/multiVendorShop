<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menuController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('admin.layouts.dashboard');
})->middleware('auth');
Route::resource('menu', menuController::class)->middleware('auth');
