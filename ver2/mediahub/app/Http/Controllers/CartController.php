<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $id => $item) {
            $cart[$id]['subtotal'] = $item['price'] * $item['quantity'];
            $total += $cart[$id]['subtotal'];
        }
        session()->put('cart', $cart);

        return view('cart.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        $id = $product->id;
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "title" => $product->title,
                "price" => $product->price,
                "quantity" => 1,
                "subtotal" => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Termék hozzáadva a kosárhoz!');
    }

    public function destroy($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Termék eltávolítva a kosárból.');
    }
}