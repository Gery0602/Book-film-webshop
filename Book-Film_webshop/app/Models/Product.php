<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'price',
        'creator',
        'release_year',
        'isbn',
        'duration',
        'format',
        'language',
        'cover_image',
        'screenshots',
        'file_path',
        'file_size',
        'is_active',
        'download_limit',
    ];

    protected $casts = [
        'screenshots' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function averageRating()
    {
        return $this->reviews()->where('is_approved', true)->avg('rating');
    }
}