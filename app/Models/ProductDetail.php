<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    public $table = "productdetail";
    protected $fillable= ['created_at','updated_at','cost','isDeleted','warranty','discount','new','ha_sp','status','featured','details','product_id','quanlity'];
}
