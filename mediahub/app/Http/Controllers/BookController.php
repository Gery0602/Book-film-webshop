<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function indexBook()
    {
        $books = Book::all();  // get all books from DB
        return view('books', compact('books')); 
    }
    public function indexDashboardBook()
    {
        $books = Book::all();  // get all books from DB
        return view('dashboard', compact('books')); 
    }
}
