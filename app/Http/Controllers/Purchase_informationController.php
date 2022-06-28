<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class Purchase_informationController extends Controller
{
    /**
    * 購入情報一覧
    *
    */
    public function index(Request $request)
    {
        $buys = Buy::get();
        return view('user.purchase_information', [
            'buys' => $buys,
        ]);
    }

    public function update(Request $request, $id)
    {
        //ステータスを変更
        $buys = Buy::where('id', $request -> id)->get(['id','status']);
        $buys->status = '1';
        $buys->update();
        //データを再取得する
        $buys = Buy::get();
        return view('user.purchase_information', [
            'buys' => $buys,
        ]);
    }
}
