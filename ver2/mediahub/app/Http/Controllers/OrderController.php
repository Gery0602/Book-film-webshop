<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'A kosár üres!');
        }

        $totalPrice = array_sum(array_column($cart, 'subtotal'));
        
        // --- Fizetés szimulációja ---
        $paymentSuccessful = true; 
        // -----------------------------

        if ($paymentSuccessful) {
            DB::transaction(function () use ($cart, $totalPrice) {
                // 1. Rendelés létrehozása
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_date' => now(),
                    'status' => 'Feldolgozás alatt',
                    'total_price' => $totalPrice,
                ]);

                // 2. Rendelési tételek hozzáadása és készlet csökkentése (itt kéne)
                foreach ($cart as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'subtotal_price' => $item['subtotal'],
                    ]);
                }
                
                // 3. Kosár törlése
                session()->forget('cart');
            });

            return redirect()->route('orders.index')->with('success', 'Rendelése sikeresen leadva és fizetve!');
        }

        return redirect()->route('cart.index')->with('error', 'Hiba történt a fizetés során.');
    }

    public function index()
    {
        // A bejelentkezett felhasználó rendelései
        $orders = Auth::user()->orders()->with('items.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }
}