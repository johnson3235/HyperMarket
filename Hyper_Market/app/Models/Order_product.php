<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'Order_id',
        'price',
        'quantity'

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
