<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class Product_managementController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        // $item = Item::where('id', '=', $request->id)->first();
        $items = Item::select('items.*', 'categories.name as category_name')->join('categories', 'items.category_id', '=', 'categories.id')->get();
        // dd($item);
        // exit;

        return view('/product/product_management')->with([
            'items' => $items,
        ]);
        
        // $items = Item::all();

        // return view('/product/product_management')->with([
        //     'items' => $items,
        // ]);
    }

    public function delete(Request $request){
        $items = Item::where('id', '=', $request->id)->first();
        $items->delete();

        return redirect('/product_management');
    }
}
