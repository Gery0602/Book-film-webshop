<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'price', // Az akkori ár rögzítése
    ];

    // Reláció: A rendelési tétel egy rendeléshez tartozik (N:1)
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Reláció: A rendelési tétel egy termékre vonatkozik (N:1)
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}