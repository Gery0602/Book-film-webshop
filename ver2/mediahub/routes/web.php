<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// ------------------------------------------------------------------
// Nyilvános útvonalak (Látogató)
// ------------------------------------------------------------------
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/termekek/{product}', [ProductController::class, 'show'])->name('products.show');


// ------------------------------------------------------------------
// Bejelentkezett Felhasználói útvonalak (Felhasználó)
// ------------------------------------------------------------------
Route::middleware(['auth'])->group(function () { 
    // Kosár
    Route::get('/kosar', [CartController::class, 'index'])->name('cart.index');
    Route::post('/kosar/add', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/kosar/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // Rendelés
    Route::post('/fizetes', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/rendeleseim', [OrderController::class, 'index'])->name('orders.index');
    
    // Profil (Ezeket a Breeze hozza létre)
    // require __DIR__.'/auth.php'; // a Breeze-ben van
});

// ------------------------------------------------------------------
// Adminisztrátori útvonalak (ADMIN) - Védett
// ------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    
    // Termékkezelés (CRUD)
    Route::resource('products', AdminProductController::class)->except(['show']);
});
// ...

// 33. // Adminisztrátori útvonalak (ADMIN) - Védett
// ... (A Route::middleware blokk)

// A bejelentkezés utáni alapértelmezett útvonal (ezt keresi a Breeze navigációja)
Route::get('/dashboard', function () {
    return view('admin.dashboard'); // Vagy a saját dashboard nézeted
})->middleware(['auth', 'verified'])->name('dashboard'); // <-- ADD HOZZÁ EZT A SORT
 
// ... A többi útvonalad
require __DIR__.'/auth.php'; // A login/register útvonalak
