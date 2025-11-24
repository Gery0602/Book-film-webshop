<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        $user = User::all();       
        $all = ['user' => $user, 'cart' => $cart];
        return view('checkout', compact('all'));
    }
}
