<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copouns extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'start_date',
        'end_date',
        'discount_type',
        'max_discount_value',
        'min_order_value',
        'max_usage_per_user',
        'max_usage_in_general',
    ];
}
