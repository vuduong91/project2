<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public $table = "wishlist";
    protected $fillable = [
        'client_id', 
        "productdetail_id", 
        "created_at", 
        "updated_at", 
        "isDeleted"
    ];
}
