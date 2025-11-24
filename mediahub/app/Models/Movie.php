<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'year',
        'rating',
        'img',
        'price',
    ];

    public $timestamps = false; // add this if your table has no created_at / updated_at
}
