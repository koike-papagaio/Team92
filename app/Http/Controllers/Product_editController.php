<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('image1')) {

            if ($request->file('image1')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name1 = $request->file('image1')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path1 = Storage::disk('s3')->putFile('/uploads', $request->file('image1'));

                // アップロード先のURLを取得する
                $file_path1 = Storage::disk('s3')->url($path1);
            }
        }else{
            $file_path1 = $items['image1'];
        }

        if ($request->hasFile('image2')) {

            if ($request->file('image2')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name2 = $request->file('image2')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path2 = Storage::disk('s3')->putFile('/uploads', $request->file('image2'));

                // アップロード先のURLを取得する
                $file_path2 = Storage::disk('s3')->url($path2);
            }
        }else{
            $file_path2 = $items['image2'];
        }

        if ($request->hasFile('image3')) {

            if ($request->file('image3')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name3 = $request->file('image3')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path3 = Storage::disk('s3')->putFile('/uploads', $request->file('image3'));

                // アップロード先のURLを取得する
                $file_path3 = Storage::disk('s3')->url($path3);
            }
        }else{
            $file_path3 = $items['image3'];
        }

        if ($request->hasFile('image4')) {

            if ($request->file('image4')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name4 = $request->file('image4')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path4 = Storage::disk('s3')->putFile('/uploads', $request->file('image4'));

                // アップロード先のURLを取得する
                $file_path4 = Storage::disk('s3')->url($path4);
            }
        }else{
            $file_path4 = $items['image4'];
        }
        
        // データを置き換える
        $items->category_id = $request->category_id;
        $items->name = $request->name;
        $items->image1 = $file_path1;
        $items->image2 = $file_path2;
        $items->image3 = $file_path3;
        $items->image4 = $file_path4;
        $items->price = $request->price;
        $items->item_detail = $request->item_detail;

        if ($request->sales_status == 1) {
            $items->sales_status = config('const.sales_status.stop');
        } else {
            $items->sales_status = config('const.sales_status.start');
        }

        // dd($items);
        // exit;
        $items->save();

        return redirect('/product_management');
    }
}
