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

        // itemsテーブルのcategory_idとcategoriesテーブルのidを紐づけて， itemsテーブルとcategoriesテーブルを合体させ，itemsテーブルの全てのカラムとcategoriesテーブルのnameカラムをcategory_nameという名前のカラムに変えて，該当するデータを取得する
        $items = Item::select('items.*', 'categories.name as category_name')->join('categories', 'items.category_id', '=', 'categories.id')->get();

        // $itemsのデータをitemsという名前でview('/product/product_management')で受け取る
        return view('/product/product_management')->with([
            'items' => $items,
        ]);
    }

    public function delete(Request $request)
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

        // itemsテーブルからidが$requestで受け取ったidと等しいデータを1件取得する
        $items = Item::where('id', '=', $request->id)->first();

        // 該当したデータを削除する
        $items->delete();

        // viewの'/product/product_management'に戻る
        return redirect('/product_management');
    }
}
