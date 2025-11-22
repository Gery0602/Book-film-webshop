<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'payment_method',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];
    
    // Reláció: A rendelés egy felhasználóhoz tartozik (N:1)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Reláció: A rendelésnek több rendelési tétele van (1:N)
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}