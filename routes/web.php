<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'getFiles']);

Route::get('/contact', function(){
    return view('contact');
})->name('contact');


Route::get('/login', function(){
    return view('auth.login');
})->name('login');


Route::get('/register', function(){
    return view('auth.register');
})->name('register');
