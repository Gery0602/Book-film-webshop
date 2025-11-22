<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;


Route::get('/', function () {return view('welcome'); })->name('home');
Route::get('/movies', function() { return view('movies');}) ->name('movies');
Route::get('/books', function () {return view('books'); }) ->name('books');
Route::get('/cart', function () {return view('cart'); }) ->name('cart');
Route::get('/dashboard', function () {return view('dashboard'); }) ->name('dashboard');


//CRUD in routes
Route::get('/movies', [MovieController::class, 'index'])->name('movies');




Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
