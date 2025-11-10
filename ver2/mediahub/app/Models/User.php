<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', 
        'address_id', 
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    // Kapcsolat a szerepkörrel
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    // Segítő metódus az admin jogosultság ellenőrzésére
    public function isAdmin()
    {
        return $this->role && $this->role->role_name === 'admin';
    }

    // Kapcsolat a rendelésekkel
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}