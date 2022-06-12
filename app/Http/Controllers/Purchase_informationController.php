<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class Purchase_informationController extends Controller
{
    /**
    * 購入履歴一覧
    *
    */
    public function index(Request $request)
    {
        $buys = Buy::get();
        return view('user.purchase_information', [
            'buys' => $buys,
        ]);
    }
}
