<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class Product_editController extends Controller
{
    //
    public function index(Request $request)
    {
        $item = Item::where('id', '=', $request->id)->first();
        

        return view('product/product_edit')->with([
            'item' => $item,
        ]);
    }

    public function edit(Request $request)
    {

    }
}
