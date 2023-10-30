<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable = [						
        'created_at',
        'updated_at',
        'client_id',
        'isDeleted',
        "sum",
        "dateorder",
        "status", 
        "shipping_id",
        "detail",
        "receiver_id",  						
    ];
}
