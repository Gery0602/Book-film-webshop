<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Megjeleníti az aktuálisan bejelentkezett felhasználó összes rendelését.
     */
    public function index()
    {
        // Lekérdezzük az autentikált felhasználó rendeléseit
        // Rendezés: a legújabb elöl
        // Eager loading: Betöltjük a tételeket (items) és a hozzájuk tartozó termékeket (product)
        $orders = Auth::user()->orders()
                      ->latest()
                      ->with(['items.product'])
                      ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Megjeleníti egy adott rendelés részleteit.
     */
    public function show(Order $order)
    {
        // Biztonsági ellenőrzés: csak a saját rendeléseit láthatja
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Jogosulatlan hozzáférés.');
        }

        // Eager loading a tételekhez és a termékekhez
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}