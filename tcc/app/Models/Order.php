<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'photo_ids', 'total_price', 'status'];

    protected $casts = [
        'photo_ids' => 'array', // Ou JSON, dependendo de como você quer armazenar
    ];
}
