<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'statuses',
        'total_price',
        'delivered_data',
        'address_id',
        'coupon_id'

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
