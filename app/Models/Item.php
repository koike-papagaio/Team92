<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image1',
        'image2',
        'image3',
        'image4',
        'price',
        'item_detail',
        'sales_status',
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
