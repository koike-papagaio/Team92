<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class Product_registerController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();

        return view('product/product_register')->with([
            'categories' => $categories,
        ]);
    }

    public function register(Request $request)
    {
        $items = new Item();
        
        $items->category_id = $request->category_id;
        $items->name = $request->name;
        $items->price = $request->price;
        $items->item_detail = $request->item_detail;
        $items->sales_status = config('const.sales_status.start');

        $items->save();


        // dd($items);
        // exit;
        return redirect('/product_management');
    }
}
