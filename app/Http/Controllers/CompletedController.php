<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Buy;

class CompletedController extends Controller
{
    /**
     * 購入完了画面
     */
    public function completed(Request $request)
    {
        //１．Cart の中身を Buy に移す（支払い方法などの入力値含む）
        $user_id = 1; //テスト用
        
        $carts = Cart::where('user_id',"=",$user_id)->get();
        
        //bought_numの最大値検索
        $work = Buy::max('bought_num');
        
        if(!isset($work)){
            //Buyテーブルにデータがない（１件目）の場合、１からスタート
            $bought_num = 1;
        }else{
            //新しいbought_numをセット
            $bought_num = $work + 1;
        }

        //1件ずつデータを登録
        foreach($carts as $cart){
            $buy = New Buy;
            $buy->fill([
                "user_id" => $cart->user_id,
                "user_name" => $cart->user_name,
                "email" => $cart->email,
                "address" => $cart->address,
                "image1" => $cart->image1,
                "item_name" => $cart->item_name,
                "price" => $cart->price,
                "quantity" => $cart->quantity,
                "payment" => $request->radioGrp01,
                "bought_num" => $bought_num
            ]);
            //２．Buy をsave
            $buy->save();
            //３．Cart を削除
            $cart->delete();
        }
        
        return view('buy.completed');
    }
}
