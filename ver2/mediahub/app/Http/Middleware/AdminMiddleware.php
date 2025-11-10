<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ellenőrizzük az isAdmin() metódust a User modellben
        if (Auth::user()->isAdmin()) {
            return $next($request); 
        }

        // Nincs jogosultság
        return redirect('/')->with('error', 'Nincs jogosultsága az adminisztrációs oldal eléréséhez.');
    }
}