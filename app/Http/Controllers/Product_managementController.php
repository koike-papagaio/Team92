<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class Product_managementController extends Controller
{
    //
    public function index()
    {
        $items = Item::all();

        return view('/product/product_management')->with([
            'items' => $items,
        ]);
    }
}
