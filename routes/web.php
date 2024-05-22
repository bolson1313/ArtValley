<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [Home::class, 'getFiles'])->name('home');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/about', function(){
    return view('home');
})->name('about');

Route::controller(OfferController::class)->group(function () {
    Route::get('/offers', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/offers/{id}', [OfferController::class, 'show'])->name('offer.show');

});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');


Route::get('/register', function(){
    return view('auth.register');
})->name('register');
