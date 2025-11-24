<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartControllerMovie;
use App\Http\Controllers\CartControllerBook;
use App\Http\Controllers\CheckoutController;



//pages index
Route::get('/', function () {return view('welcome'); })->name('home');
Route::get('/movies', function() { return view('movies');}) ->name('movies');
Route::get('/books', function () {return view('books'); }) ->name('books');
Route::get('/dashboard', function () {return view('dashboard'); }) ->name('dashboard');
Route::get('/checkout', function () {return view('checkout'); }) ->name('checkout');

Route::get('auth/login', function () {return view('login'); })->name('login');
Route::get('auth/register', function () {return view('register'); })->name('register');

//CRUD in routes for movies
Route::get('/', [MovieController::class, 'indexWelcome'])->name('all');
Route::get('/movies', [MovieController::class, 'indexMovie'])->name('movies');
Route::get('/dashboard', [MovieController::class, 'indexDashboard'])->name('all');

//CRUD in routes for books
Route::get('/books', [BookController::class, 'indexBook'])->name('books');

//CRUD in routes for cart
Route::post('/movies', [CartControllerMovie::class, 'store'])->name('cart.movie');
Route::post('/books', [CartControllerBook::class, 'store'])->name('cart.book');


//rout for checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('all');






