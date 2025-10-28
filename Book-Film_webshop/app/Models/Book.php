<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
        'publication_year',
        'pages',
        'isbn',
        'price',
        'rating',
        'language',
        'publisher',
        'is_featured',
        'stock'
    ];
}