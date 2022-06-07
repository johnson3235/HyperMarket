<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'status',
        'image',
        'category_id'

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
