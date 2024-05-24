<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('/home');
});

Route::get('/home', [Home::class, 'getFiles'])->name('home');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::controller(OfferController::class)->group(function () {
    Route::get('/offers', 'index')->name('offer.index');
    Route::get('/offer/{id}', 'show')->name('offer.show');
    Route::get('/offers/user/{user_id}', 'user_offers')->name('offer.user');
    Route::get('/offers/edit/{offer_id}', 'edit')->name('offer.edit');
    Route::put('/offers/update/{offer_id}', 'update')->name('offer.update');
    Route::get('/offers/create', 'show_form')->name('offer.create');
    Route::post('/offers/create', 'store')->name('offer.store');
    Route::delete('/offer/delete/{offer}', 'destroy')->name('offer.destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/settings/{user}', 'edit')->name('user.settings');
    Route::post('/users/settings/{user}', 'update')->name('user.update');
});
Route::get('/users/{user}/transactions', [TransactionController::class, 'getTransactions'])->name('user.transactions');


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');});


Route::get('/register', [AuthController::class, 'RegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
