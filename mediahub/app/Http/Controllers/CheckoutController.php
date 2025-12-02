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
        
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
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
        
        $cart = Cart::where('user_id', $user->id)->get();
        
        
        $orderId = rand(10000, 99999);
        
        
        
        $all = ['user' => $user, 'cart' => $cart];
        
        
        return view('invoice', compact('all', 'orderId'));
    }
    
    public function downloadInvoice($orderId)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        $cart = Cart::where('user_id', $user->id)->get();
        
        $all = ['user' => $user, 'cart' => $cart];
        
        // PDF generálás
        
        $pdf = Pdf::loadView('invoice', [
            'all' => $all,
            'orderId' => $orderId,
            'isPdf' => true
        ]);
        
        // PDF letöltése
        return $pdf->download('szamla-' . $orderId . '.pdf');
    }
}