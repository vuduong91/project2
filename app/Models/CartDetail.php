<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table="cartdetail";
    protected $fillable = [					
        'created_at',
        'updated_at',
        'quanlity',
        'productdetail_id',
        'cart_id',
        'isDeleted'
    ];
}
