<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $featuredMovies = Movie::where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        $featuredBooks = Book::where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
      
        $newMovies = Movie::orderBy('release_year', 'desc')
            ->take(8)
            ->get();
        
        $newBooks = Book::orderBy('publication_year', 'desc')
            ->take(8)
            ->get();
        
       
        $popularMovies = Movie::orderBy('rating', 'desc')
            ->take(4)
            ->get();
        
        $popularBooks = Book::orderBy('rating', 'desc')
            ->take(4)
            ->get();

        return view('home', compact(
            'featuredMovies',
            'featuredBooks',
            'newMovies',
            'newBooks',
            'popularMovies',
            'popularBooks'
        ));
    }
}
