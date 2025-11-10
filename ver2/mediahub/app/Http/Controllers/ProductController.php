<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // A nyilvános terméklista megjelenítése (főoldal)
  // App/Http/Controllers/ProductController.php

public function index()
{
    $products = Product::paginate(12);
    // ELLENŐRIZD: Ez a sor pontosan így van-e leírva?
    return view('products.index', compact('products')); 
}

    // Egy termék részletes nézetének megjelenítése
    public function show(Product $product)
    {
        // A termék automatikus betöltése a {product} útvonalparaméter alapján
        return view('products.show', compact('product'));
    }
}