<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // If you have constructor dependencies, make sure they're valid
    public function __construct()
    {
        // Your code here
    }

    public function indexAdmin()
    {
        $orders =  Order::all();
        return view('admin', compact('orders'));
    }
}