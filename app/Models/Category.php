<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getCategoryList() {

        $categorys = Category::pluck('name', 'id');

        return $categorys;
    }

    public function items() {

        return $this->hasMany(Item::class);
    }
}
