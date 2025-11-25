<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;

class BookController extends Controller
{
    public function indexBook()
    {
        $cart = Cart::all();
        $books = Book::all();
        $cart_count = Cart::count();
        $all = ['books' => $books, 'cart' => $cart, 'cart_count' => $cart_count];
        return view('books', compact('all')); 
    }
    public function indexDashboardBook()
    {
        $books = Book::all();  // get all books from DB
        return view('dashboard', compact('books')); 
    }
}
