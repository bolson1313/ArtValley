<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [Home::class, 'getFiles'])->name('home');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::controller(OfferController::class)->group(function () {
    Route::get('/offers', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/offers/{id}', [OfferController::class, 'show'])->name('offer.show');

});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});


Route::get('/register', [AuthController::class, 'RegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
