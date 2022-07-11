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
        $buys = Buy::where('user_id',session()->get("id"))->get();

        return view('buy.buy_history', [
            'buys' => $buys,
        ]);
    }
}