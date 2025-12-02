<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class MovieController extends Controller
{
    /* Movies */
    public function indexMovie()
    {
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->get();
        $movies = Movie::all();
        $cart_count = Cart::where('user_id', $userId)->count();

        $all = ['movies' => $movies, 'cart' => $cart, 'cart_count' => $cart_count];
        return view('movies', compact('all'));
    }
    public function indexWelcome()
    {
        $movies = Movie::all();  // get all movies from DB
        $books = Book::all();  // get all books from DB
        $all = ['movies' => $movies, 'books' => $books];
        return view('welcome', compact('all'));
    }
    public function indexDashboard()
    {
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->get();
        $movies = Movie::all();
        $books = Book::all();
        $cart_count = Cart::where('user_id', $userId)->count();

        $all = [
            'movies' => $movies,
            'books' => $books,
            'cart' => $cart,
            'cart_count' => $cart_count
        ];

        return view('dashboard', compact('all'));
    }
}
