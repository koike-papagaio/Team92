<?php

namespace App\Http\Controllers;

use Illuminate\Http\request;

use App\Models\Cart;
use App\Models\Buy;

class BasketController extends Controller
{
    /**
     * 買い物かご画面
     */
    public function basket(Request $request)
    {
        $user_id = session()->get("id");

        $carts = Cart::where('user_id',"=",$user_id)->get();
        //１．金額の集計を変数にセットする
        $money = Cart::selectRaw('SUM(price * quantity) as total')
        ->where('user_id',"=",$user_id)
        ->first();
        
        return view('buy.basket', compact('carts','money'));
    }

    /**
     * 削除機能
     */
    public function destroy(Request $request, $id)
    {
        $carts = Cart::find($id);
        $carts->delete();

        $user_id = session()->get('id');
        
        $carts = Cart::where('user_id',"=",$user_id)->get();
        //１．金額の集計を変数にセットする
        $money = Cart::selectRaw('SUM(price * quantity) as total')
        ->where('user_id',"=",$user_id)
        ->first();
        return view('buy.basket', compact('carts','money'));
    }

}
