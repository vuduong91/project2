<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmethods extends Model
{
    use HasFactory;
    protected $table="shipping";
    protected $fillable = [						
        'created_at',
        'updated_at',
        'namePttt',
        'cost',
        'isDeleted'
    ];
}
