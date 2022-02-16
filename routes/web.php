<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Route::view('/uczen', 'test')->name('student.login');

//Auth::routes();

Route::controller(HomeController::class)->middleware('setlocale')->group(function() {
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/login', 'loginr')->name('login');
        
    Route::prefix('/uczen')->group(function(){
        Route::middleware('guest')->group(function(){
            Route::get('/', 'login')->name('student.login');
            Route::post('/', 'student_login');
            Route::get('/zarejestruj-karte', 'register')->name('student.register');
            Route::post('/zarejestruj-karte', 'student_register');
        });


        Route::middleware('auth')->group(function(){
            Route::get('/karta', 'card')->name('student.card');
            Route::post('/kod', 'code')->name('student.get.code');
        });
    });

    Route::get('/home', 'redirect')->name('home');

});



