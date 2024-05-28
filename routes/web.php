<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
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

    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/offers/user/{user}', 'user_offers')->name('offer.user');
        Route::get('/offers/edit/{offer}', 'edit')->name('offer.edit');
        Route::put('/offers/update/{offer_id}', 'update')->name('offer.update');
        Route::get('/offers/create', 'show_form')->name('offer.create');
        Route::post('/offers/create', 'store')->name('offer.store');
        Route::delete('/offer/delete/{offer}', 'destroy')->name('offer.destroy');
        Route::get('/offers/buy/{offer}', 'buy_menu')->name('offer.buy.menu');
        Route::post('/offers/buy/{offer}', 'buy_offer')->name('offer.buy');
    });

});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/settings/{user}', 'edit')->name('user.settings');
    Route::post('/users/settings/{user}', 'update')->name('user.update');
})->middleware(AuthMiddleware::class);
Route::get('/users/{user}/transactions', [TransactionController::class, 'getTransactions'])->name('user.transactions')->middleware(AuthMiddleware::class);


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');}
);
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/panel', 'showAdmin')->name('admin.panel');

        //user crud
        Route::get('/admin/panel/users', 'users')->name('admin.users');
        Route::get('/admin/panel/users/new', 'user_add')->name('admin.userNew');
        Route::post('/admin/panel/users/new', 'user_store')->name('admin.usersCreate');
        Route::get('/admin/panel/user/{user}/edit', 'user_edit')->name('admin.userEdit');
        Route::post('/admin/panel/user/updated', 'user_update')->name('admin.usersUpdate');
        Route::delete('/admin/panel/user/delete/{user}', 'user_destroy')->name('admin.userDelete');

        //artist crud
        Route::get('/admin/panel/artists', 'artists')->name('admin.artists');
        Route::get('/admin/panel/artists/new', 'artist_add')->name('admin.artistNew');
        Route::post('/admin/panel/artists/new', 'artist_store')->name('admin.artistCreate');
        Route::get('/admin/panel/artists/{artist}/edit', 'artist_edit')->name('admin.artistEdit');
        Route::post('/admin/panel/artists/updated', 'artist_update')->name('admin.artistUpdate');
        Route::delete('/admin/panel/artists/delete/{artist}', 'artist_destroy')->name('admin.artistDelete');

        //artwork crud
        Route::get('/admin/panel/artworks', 'artworks')->name('admin.artworks');
        Route::get('/admin/panel/artwork/new', 'artwork_add')->name('admin.artworkNew');
        Route::post('/admin/panel/artwork/new', 'artwork_store')->name('admin.artworkCreate');
        Route::get('/admin/panel/artwork/{artwork}/edit', 'artwork_edit')->name('admin.artworkEdit');
        Route::post('/admin/panel/artwork/updated', 'artwork_update')->name('admin.artworkUpdate');
        Route::delete('/admin/panel/artwork/delete/{artwork}', 'artwork_destroy')->name('admin.artworkDelete');

        //offer crud
        Route::get('/admin/panel/offers', 'offers')->name('admin.offers');
        Route::get('/admin/panel/offers/new', 'offer_add')->name('admin.offerNew');
        Route::post('/admin/panel/offers/new', 'offer_store')->name('admin.offerCreate');
        Route::get('/admin/panel/offers/{offer}/edit', 'offer_edit')->name('admin.offerEdit');
        Route::post('/admin/panel/offers/updated', 'offer_update')->name('admin.offerUpdate');
        Route::delete('/admin/panel/offers/delete/{offer}', 'offer_destroy')->name('admin.offerDelete');


        //transaction crud
        Route::get('/admin/panel/transactions', 'transactions')->name('admin.transactions');
        Route::get('/admin/panel/transactions/new', 'transaction_add')->name('admin.transactionNew');
        Route::post('/admin/panel/transactions/new', 'transaction_store')->name('admin.transactionCreate');
        Route::get('/admin/panel/transactions/{transaction}/edit', 'transaction_edit')->name('admin.transactionEdit');
        Route::post('/admin/panel/transactions/updated', 'transaction_update')->name('admin.transactionUpdate');
        Route::delete('/admin/panel/transactions/delete/{transaction}', 'transaction_destroy')->name('admin.transactionDelete');


        //chart with active and inactive offers
        Route::get('/admin/panel/stats', 'offerStats')->name('admin.stats');
    });
});


Route::get('/register', [AuthController::class, 'RegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::fallback(function (){
    return view('error_page');
});
