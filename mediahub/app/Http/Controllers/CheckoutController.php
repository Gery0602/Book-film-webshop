<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{
    public function index()
    {
        // Bejelentkezett felhasználó lekérése
        $user = Auth::user();
        
        // Ha nincs bejelentkezve, átirányítás a login oldalra
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Cart items lekérése
        $cart = Cart::where('user_id', $user->id)->get();
        
        $all = ['user' => $user, 'cart' => $cart];
        return view('checkout', compact('all'));
    }
    
    public function handleCheckout()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Cart items lekérése
        $cart = Cart::where('user_id', $user->id)->get();
        
        // Rendelés feldolgozása (itt mentheted az adatbázisba)
        $orderId = rand(10000, 99999);
        
        // TODO: Mentsd el a rendelést az adatbázisba
        
        $all = ['user' => $user, 'cart' => $cart];
        
        // Számla oldal megjelenítése böngészőben
        return view('invoice', compact('all', 'orderId'));
    }
    
    public function downloadInvoice($orderId)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Cart items lekérése (vagy az adott rendeléshez tartozó items)
        $cart = Cart::where('user_id', $user->id)->get();
        
        $all = ['user' => $user, 'cart' => $cart];
        
        // PDF generálás
        $pdf = PDF::loadView('invoice', [
            'all' => $all,
            'orderId' => $orderId,
            'isPdf' => true
        ]);
        
        // PDF letöltése
        return $pdf->download('szamla-' . $orderId . '.pdf');
    }
}