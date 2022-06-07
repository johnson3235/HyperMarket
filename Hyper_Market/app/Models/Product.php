<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'name_en',
        'name_ar',
        'price',
        'code',
        'quantity',
        'image',
        'status',
        'des_en',
        'des_ar',
        'brand_id',
        'sub_category_id'
    ];
}
