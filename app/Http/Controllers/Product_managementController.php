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
        // categoriesテーブルから全てのデータを取ってくる
        $categories = Category::all();

        // itemsテーブルのcategory_idとcategoriesテーブルのidを紐づけて， itemsテーブルとcategoriesテーブルを合体させ，itemsテーブルの全てのカラムとcategoriesテーブルのnameカラムをcategory_nameという名前のカラムに変えて，該当するデータを取得する
        $items = Item::select('items.*', 'categories.name as category_name')->join('categories', 'items.category_id', '=', 'categories.id')->get();

        // $itemsのデータをitemsという名前でview('/product/product_management')で受け取る
        return view('/product/product_management')->with([
            'items' => $items,
        ]);
        
    }

    public function delete(Request $request){
        $items = Item::where('id', '=', $request->id)->first();
        $items->delete();

        return redirect('/product_management');
    }
}
