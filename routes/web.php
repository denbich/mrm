<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::view('/', 'test');

//Auth::routes();

Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index')->name('home');
});

