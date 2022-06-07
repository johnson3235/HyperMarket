<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'offer_id',
        'price_after_discount',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
