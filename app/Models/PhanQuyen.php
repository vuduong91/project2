<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use HasFactory;
    public $table = "phanquyen";
    protected $fillable = ['created_at','updated_at','ql_user','ql_product','ql_category','ql_order','admin_id','isDeleted'];
}
