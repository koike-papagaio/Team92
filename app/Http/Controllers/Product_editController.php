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
        $categories = Category::all();
        // $item = Item::where('id', '=', $request->id)->first();
        $item = Item::select('items.*', 'categories.name as category_name')->join('categories', 'items.category_id', '=', 'categories.id')->where('items.id', '=', $request->id)->first();
        // dd($item);
        // exit;

        return view('product/product_edit')->with([
            'categories' => $categories,
            'item' => $item,
        ]);
    }

    public function edit(Request $request)
    {
        $items = Item::where('id', '=', $request->id)->first();
        // dd($items);
        // exit;

        // データを置き換える
        $items->category_id = $request->category_id;
        $items->name = $request->name;
        $items->image1 = $request->image1;
        $items->image2 = $request->image2;
        $items->image3 = $request->image3;
        $items->image4 = $request->image4;
        $items->price = $request->price;
        $items->item_detail = $request->item_detail;

        if($request->sales_status == 1){
            $items->sales_status = config('const.sales_status.stop');
        }else{
            $items->sales_status = config('const.sales_status.start');
        }

        // dd($items);
        // exit;
        $items->save();

        return redirect('/product_management');
    }

}
