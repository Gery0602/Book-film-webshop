<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();  // get all movies from DB
        return view('dashboard', compact('movies')); 
    }
}
