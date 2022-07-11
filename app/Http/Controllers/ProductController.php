<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = new Category;
        $categories = $category->getCategoryList();
        $categoryId = $request->input('categoryId');
        $keyword = $request->input('keyword');
        $order = $request->order;

        $query = Item::query()->where('sales_status', config('const.sales_status.start'));

        if (isset($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->where('sales_status', config('const.sales_status.start'));
        }

        if (isset($categoryId)) {
            $query->where('category_id', $categoryId)->where('sales_status', config('const.sales_status.start'));
        }

        switch ($order) {
            case 'desc':
                $item = $query->orderBy('id', 'desc')->paginate(18);
                break;

            case 'asc':
                $item = $query->orderBy('id', 'asc')->paginate(18);
                break;

            default:
                $item = $query->orderBy('id', 'desc')->paginate(18);
                break;
        }

        return view('index', [
            'item' => $item,
            'keyword' => $keyword,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'order' => $order,
        ]);
    }

    public function product_detail(Request $request)
    {
        $item = Item::where('id', "=", $request->id)->first();

        return view('/product_detail', ['item' => $item,]);
    }

    public function add(Request $request)
    {
        // if文でログインチェック
        // sessionなかったらログイン画面に飛ばす
        // ログインの段階で保存したセッションの値(id)を取得する
        $user_id = session()->get("id");

        // セッションの値が無い場合
        if (!isset($user_id)) {
            // viewの'/login'に戻る
            return redirect('/login');
        }

        $user = User::where('id', "=", session()->get('id'))->first();
        $item = Item::where('id', "=", $request->item_id)->first();

        $cart = new Cart;
        $cart->fill([
            "user_id" => $user->id,
            "user_name" => $user->name,
            "address" => $user->address,
            "email" => $user->email,
            "image1" => $item->image1,
            "item_name" => $item->name,
            "price" => $item->price,
            "quantity" => $request->quantity
        ]);
        //２．Buy をsave
        $cart->save();

        return redirect('/basket');
    }
}
