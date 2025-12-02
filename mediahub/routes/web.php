<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartControllerMovie;
use App\Http\Controllers\CartControllerBook;
use App\Http\Controllers\CheckoutController;



//pages index
Route::get('/', [MovieController::class, 'indexWelcome'])->name('home');
Route::get('/movies', [MovieController::class, 'indexMovie'])->name('movies');
Route::get('/books', [BookController::class, 'indexBook'])->name('books');
Route::get('/dashboard', [MovieController::class, 'indexDashboard'])->name('dashboard');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('auth/login', function () {return view('login'); })->name('login');
Route::get('auth/register', function () {return view('register'); })->name('register');


//CRUD in routes for cart
Route::post('/movies', [CartControllerMovie::class, 'store'])->name('cart.movie');
Route::post('/books', [CartControllerBook::class, 'store'])->name('cart.book');


Route::delete('/cart/book/remove/{id}', [CartControllerBook::class, 'remove'])->name('book.cart.remove');
Route::delete('/cart/movie/remove/{id}', [CartControllerMovie::class, 'remove'])->name('movie.cart.remove');

Route::put('/cart/update/{id}', [CartControllerBook::class, 'updateQuantity'])->name('cart.updateQuantity');


// -------------------------
// SZÁMLA OLDALHOZ SZÜKSÉGES ROUTE-OK
// -------------------------
Route::post('/checkout', [CheckoutController::class, 'handleCheckout'])->name('checkout.process');

Route::get('/invoice/download/{orderId}', [CheckoutController::class, 'downloadInvoice'])->name('invoice.download');