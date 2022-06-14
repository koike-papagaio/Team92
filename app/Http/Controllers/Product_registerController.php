<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Storage;

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
    //     if($request->file('image1')->isValid([]) && $request->file('image2')->isValid([]) && $request->file('image3')->isValid([]) && $request->file('image4')->isValid([])){
    //         // ファイルそのものはWebサーバーに保存
    //         $file_name1 = $request->file('image1')->getClientOriginalName();
    //         $file_name2 = $request->file('image2')->getClientOriginalName();
    //         $file_name3 = $request->file('image3')->getClientOriginalName();
    //         $file_name4 = $request->file('image4')->getClientOriginalName();

    //         // s3にアップロード(/uploadsフォルダ内に)
    //         $path1 = Storage::disk('s3')->putFile('/uploads', $request->file('image1'));
    //     }

        $items = new Item();
        
        $items->category_id = $request->category_id;
        $items->name = $request->name;
        $items->image1 = $request->image1;
        $items->image2 = $request->image2;
        $items->image3 = $request->image3;
        $items->image4 = $request->image4;
        $items->price = $request->price;
        $items->item_detail = $request->item_detail;
        $items->sales_status = config('const.sales_status.start');

        $items->save();

        // dd($items);
        // exit;
        return redirect('/product_management');
    }
}
