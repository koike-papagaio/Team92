<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class Member_editController extends Controller
{
    //
    public function index(Request $request)
    {
        // ログインの段階で保存したセッションの値(idとadmin)を取得する
        $user_id = session()->get("id");

        $user_admin = session()->get("admin");

        // セッションの値が無い場合
        if (empty($user_id) || empty($user_admin)) {
            // viewの'/login'に戻る
            return redirect('/login');
        }
        
        // usersテーブルのidから該当のデータを取ってくる
        $user = User::where('id', '=', $request->id)->first();

        // $usersのデータをusersという名前でview('/user/member_edit')で受け取る
        return view('user/member_edit')->with([
            'user' => $user,
        ]);
    }

    public function edit(Request $request)
    {
        // usersテーブルから$requestで受け取ったidとitemsテーブルのidが同じデータを1件取得する
        $user = User::where('id', '=', $request->id)->first();

        // バリデーション実行
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'address' => 'required|string|max:191',
                'email' => 'required|email:rfc,dns|max:191',
                'password' => 'nullable|string|max:128',
                'pay_limit' => 'required|integer',
            ],
        );

        // バリデーションで引っかかった場合
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        // データを置き換える
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->pay_limit = $request->pay_limit;

        // データを保存する
        $user->save();

        // viewの'/login'に戻る
        return redirect('/login');
    }
}
