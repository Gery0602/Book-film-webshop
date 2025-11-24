<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Book;
use App\Models\Cart;

class MovieController extends Controller
{
    /* Movies */
    public function indexMovie()
    {
        $cart = Cart::all();
        $movies = Movie::all();  // get all movies from DB        
        $all = ['movies' => $movies, 'cart' => $cart];
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
        $movies = Movie::all();  // get all movies from DB
        $books = Book::all();  // get all books from DB
        $all = ['movies' => $movies, 'books' => $books];
        return view('dashboard', compact('all'));
    }
}
