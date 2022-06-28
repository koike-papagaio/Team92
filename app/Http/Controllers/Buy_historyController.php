<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class Buy_historyController extends Controller
{
    /**
    * 購入履歴一覧
    *
    */
    public function index(Request $request)
    {

        
        $names = Buy::where('user_id',1)->first();
        // array_shiftを使用して配列の先頭の要素を取り出す
        $value = reset($names);

        $buys = Buy::where('user_id',1)
        ->where('bought_num',2022060001)->get();
        
        
        return view('buy.buy_history', [
            'buys' => $buys,
            'names' => $value,
            
        ]);
    }
}