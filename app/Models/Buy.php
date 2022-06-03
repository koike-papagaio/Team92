<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'address',
        'email',
        'image1',
        'item_name',
        'price',
        'quantity',
        'payment',
        'bought_num',
    ];
}
