<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table="orderdetail";
    protected $fillable = [						
        'created_at',
        'updated_at',
        'product_id',
        'order_id',
        'cost',
        'quanlity',
        'isDeleted'						
    ];
}
