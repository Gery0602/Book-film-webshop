<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Book;

class MovieController extends Controller
{
            /* Movies */   
    public function indexMovie()
    {
        $movies = Movie::all();  // get all movies from DB        
        return view('movies', compact('movies')); 
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
