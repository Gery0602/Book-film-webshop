<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;



class CartControllerBook extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // A product_id lekérése a formból
        $product = Book::findOrFail($request->product_id);

        $item = new Cart();
        $item->user_id = $user->id;
        $item->product_name = $product->title;
        $item->product_count = 1;
        $item->price = $product->price;
        $item->save();

        return redirect()->back()->with('cart_success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

public function updateQuantity(Request $request, $itemId)
{
    // Megkeressük az adott kosár tételt az ID alapján
    $cartItem = Cart::find($itemId);

    // BIZTONSÁG: Ellenőrizd, hogy létezik-e, és hogy az aktuális felhasználóé-e
    if ($cartItem && $cartItem->user_id == auth()->id()) { 
        
        // A kért mennyiséget beállítjuk az adott tételhez
        $cartItem->product_count = (int)$request->quantity; 
        
        // Elmentjük a módosítást
        $cartItem->save();
        
        return redirect()->back()->with('success', 'A tétel mennyisége frissítve.');
    }
    
    return redirect()->back()->with('error', 'Hiba történt a tétel frissítésekor.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function remove($id)
{
    $cartItem = Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
    }

    return redirect()->back()->with('success', 'Item removed from cart.');
}
}
