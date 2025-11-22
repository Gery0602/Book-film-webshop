<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function indexMovie()
    {
        $movies = Movie::all();  // get all movies from DB
        return view('movies', compact('movies')); 
    }
    public function indexWelcome()
    {
        $movies = Movie::all();  // get all movies from DB
        return view('welcome', compact('movies')); 
    }
    public function indexDashboard()
    {
        $movies = Movie::all();  // get all movies from DB
        return view('dashboard', compact('movies')); 
    }
}
