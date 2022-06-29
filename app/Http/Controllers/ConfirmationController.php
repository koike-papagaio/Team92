<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cart;
use App\Models\Buy;

class ConfirmationController extends Controller
{
    /**
     * 購入確認画面
     */
    public function confirmation(Request $request)
    {
        //$user_id = $request->session()->get('user_id');
        $user_id = 1; //テスト用
        //cartのID持ってくる
        $carts = Cart::where('user_id',"=",$user_id)->get();
        //$id = $request->session()->get('id');
        $id = 1; //テスト用
        //userのID持ってくる
        $users = User::where('id',"=",$id)->get();
        //１．金額の集計を変数にセットする
        $aa = Cart::selectRaw('SUM(price * quantity) as total')
        ->where('user_id',"=",$user_id)
        ->first();
        return view('buy.confirmation', compact('carts','users','aa'));
    }
}
