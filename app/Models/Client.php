<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table="client";
    protected $fillable = [ 'email', 'password','created_at','updated_at','name','address','isDeleted','phone'];
}
