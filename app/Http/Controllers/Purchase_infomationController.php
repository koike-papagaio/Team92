<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Purchase_infomationController extends Controller
{
    /**
    * 購入履歴一覧
    *
    */
    public function index(Request $request)
    {
        $buys = Buy::orderBy('id', 'asc')->get();
        return view('user.purchase_infomation', [
            'buys' => $buys,
        ]);
    }
}
