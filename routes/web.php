<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CRUD\CartController;
use App\Http\Controllers\CRUD\CommentsController;
use App\Http\Controllers\CRUD\OrdersController;
use App\Http\Controllers\CRUD\ProductController;
use App\Http\Controllers\Pages\PagesController;
use Illuminate\Support\Facades\Route;

// Pages Controller
Route::controller(PagesController::class)->group(function(){
    Route::get('register_form', 'register_form')->name('register.form');
    Route::get('login_form', 'login_form')->name('login.form');
    Route::get('about', 'about')->name('about');
});

// Authentication Controller
Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register')->name('auth.register');
    Route::post('login', 'login')->name('auth.login');
    Route::post('logout', 'logout')->name('auth.logout');
});

// Product Controller
Route::controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('product.index');
    Route::get('/products/show/{id}', 'show')->name('product.show');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/products/add', 'storeView')->name('product.storeView');
});

// Comment Controller
Route::controller(CommentsController::class)->group(function(){
    Route::post('/product/{id}/addComment', 'store')->name('comment.store');
});

// Orders Controller
Route::controller(OrdersController::class)->group(function(){
    Route::get('/orders/show', 'showOrdersForUser')->name('order.show');
    Route::post('/orders/newOrder', 'makeOrder')->name('order.makeOrder');
});

// Cart Controller
Route::controller(CartController::class)->group(function(){
    Route::post('/cart/add', 'addToCart')->name('cart.add');
    Route::get('/cart', 'showCart')->name('cart.show');
    //Route::post('cart/remove', 'removeFromCart')->name('cart.remove');
    Route::get('cart/remove/{id}', 'remove')->name('cart.remove');
});


// *************** VAZNO ***************
// Potrebno je testirati sve api endpointe *CHECKED*
// Potrebno je proveriti sve funkcionalnosti što se 
// tiče web razvoja i ako je potrebno izbrisati neke metode iz controllera *CHECKED*
// Potrebno je srediti web.php fajl *CHECKED*

// Srediti URL da se ne vidi id
// Srediti sve linkove i slicne stvari da se ne vidi id nigde i to moze
// da bude reseno enkripcijom

// Potrebno odraditi middleware za admina i primeniti ga na navigaciju *CHECKED*
// Potrebno obnoviti Migracije, Seeds, Gate, Middleware, Requests 

// Novi zahtevi
// Potrebno je kreirati novi projekat sa bazom podataka kao apiLaravel projekat koji sam pravio (dodatna tabela Role) *CHECKED*
// Kreirati migracije, modele, kontrolere, request fajlove, web fajlove *CHECKED*
// Poenta svega ovoga je da bi se proveravala Rola korisnika za link u navigaciji kao npr. ('addProduct' koji ima Admin, ali nema korisnik) *CHECKED*
// Potrebno je napraviti da proizvodi u korpi mogu da se check-iraju
// Potrebno je povezati da check-irani proizvodi budu kreirani kao Order
// Nakon toga samo odraditi dizajn za Orders i Cart 
// I projekat je gotov

// Pre svega pokrenuti projekat i proveriti sve endpointove, zapravo testirati ih
// Nakon toga moze se krenuti sa daljim radom i cekirati jedno po jedno