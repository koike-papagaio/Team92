<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Item;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;

class Product_registerController extends Controller
{
    //
    public function index()
    {
        // ログインの段階で保存したセッションの値(idとadmin)を取得する
        $user_id = session()->get("id");

        $user_admin = session()->get("admin");

        // セッションの値が無い場合
        if (!isset($user_id) || !isset($user_admin)) {
            // viewの'/login'に戻る
            return redirect('/login');
        }

        // セッションのadminの値が管理者権限であるadmin = 1 でない場合->管理者権限の無いユーザーが情報を編集するのを防ぐ
        if ($user_admin == config('const.admin.general')) {
            // viewの'/login'に戻る
            return redirect('/login');
        }

        // categoriesテーブルから全てのデータを取ってくる
        $categories = Category::all();

        // $categoriesのデータをcategoriesという名前でview('/product/product_register')で受け取る
        return view('product/product_register')->with([
            'categories' => $categories,
        ]);
    }

    public function register(Request $request)
    {
        // バリデーション実行
        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => ['required'],
                'name' => ['required','string','max:50'],
                'image1' => ['nullable','image'],
                'image2' => ['nullable','image'],
                'image3' => ['nullable','image'],
                'image4' => ['nullable','image'],
                'price' => ['required','integer'],
                'item_detail' => ['required','string','max:191'],
            ],
        );

        // バリデーションで引っかかった場合
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // hasFileメソッドで$requestの中にファイルが存在しているのか判定
        if ($request->hasFile('image1')) {

            // isValidメソッドでファイルが存在しているかに付け加え、問題なくアップロードできたのか確認
            if ($request->file('image1')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name1 = $request->file('image1')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path1 = Storage::disk('s3')->putFile('/uploads', $request->file('image1'));

                // アップロード先のURLを取得する
                $file_path1 = Storage::disk('s3')->url($path1);
            }
        } else {
            // ファイルが存在しない場合は，$file_path1にnullを代入する
            $file_path1 = null;
        }

        // hasFileメソッドで$requestの中にファイルが存在しているのか判定
        if ($request->hasFile('image2')) {

            // isValidメソッドでファイルが存在しているかに付け加え、問題なくアップロードできたのか確認
            if ($request->file('image2')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name2 = $request->file('image2')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path2 = Storage::disk('s3')->putFile('/uploads', $request->file('image2'));

                // アップロード先のURLを取得する
                $file_path2 = Storage::disk('s3')->url($path2);
            }
        } else {
            // ファイルが存在しない場合は，$file_path2にnullを代入する
            $file_path2 = null;
        }

        // hasFileメソッドで$requestの中にファイルが存在しているのか判定
        if ($request->hasFile('image3')) {

            // isValidメソッドでファイルが存在しているかに付け加え、問題なくアップロードできたのか確認
            if ($request->file('image3')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name3 = $request->file('image3')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path3 = Storage::disk('s3')->putFile('/uploads', $request->file('image3'));

                // アップロード先のURLを取得する
                $file_path3 = Storage::disk('s3')->url($path3);
            }
        } else {
            // ファイルが存在しない場合は，$file_path3にnullを代入する
            $file_path3 = null;
        }

        // hasFileメソッドで$requestの中にファイルが存在しているのか判定
        if ($request->hasFile('image4')) {

            // isValidメソッドでファイルが存在しているかに付け加え、問題なくアップロードできたのか確認
            if ($request->file('image4')->isValid()) {

                // ファイルそのものはWebサーバーに保存
                $file_name4 = $request->file('image4')->getClientOriginalName();

                // s3にアップロード(/uploadsフォルダ内に)
                $path4 = Storage::disk('s3')->putFile('/uploads', $request->file('image4'));

                // アップロード先のURLを取得する
                $file_path4 = Storage::disk('s3')->url($path4);
            }
        } else {
            // ファイルが存在しない場合は，$file_path4にnullを代入する
            $file_path4 = null;
        }

        // Item Modelsを呼び出す
        $items = new Item();

        // データを代入する
        $items->category_id = $request->category_id;
        $items->name = $request->name;
        $items->image1 = $file_path1;
        $items->image2 = $file_path2;
        $items->image3 = $file_path3;
        $items->image4 = $file_path4;
        $items->price = $request->price;
        $items->item_detail = $request->item_detail;
        $items->sales_status = config('const.sales_status.start');

        // データを保存する
        $items->save();

        // viewの'/product_management'に戻る
        return redirect('/product_management');
    }
}
