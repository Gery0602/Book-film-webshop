<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function indexBook()
    {
        // csak a bejelentkezett user kosara
        $cart = Cart::where('user_id', Auth::id())->get();

        // könyvek változatlanul
        $books = Book::all();

        // csak az adott felhasználó kosár elemeit számolja
        $cart_count = Cart::where('user_id', Auth::id())->count();

        // ugyanabban a struktúrában adjuk át mint eddig
        $all = [
            'books' => $books,
            'cart' => $cart,
            'cart_count' => $cart_count
        ];

        return view('books', compact('all')); 
    }

    public function indexDashboardBook()
    {
        // dashboard marad változatlan
        $books = Book::all();
        return view('dashboard', compact('books')); 
    }
}
