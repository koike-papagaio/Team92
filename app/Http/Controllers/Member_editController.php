<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;

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
        if (!isset($user_id) || !isset($user_admin)) {
            // viewの'/login'に戻る
            return redirect('/login');
        }

        // セッションのidの値と$requestで受け取ったidが異なる場合->ログインしたユーザーが他のユーザーの情報を編集するのを防ぐ
        if ($user_id != $request->id) {
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
                'name' => ['required', 'string', 'max:30'],
                'address' => ['required', 'string', 'max:191'],
                'email' => ['required', 'email:rfc,dns', 'string', 'max:191', Rule::unique('users')->ignore($user->id)],
                'password' => ['nullable', 'string', 'max:128'],
                'pay_limit' => ['required', 'integer'],
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

        // セッションに編集したデータを登録しなおす
            //セッションをセット(idとadmin)
            $request->session()->put([
                "id" => $user->id,
                "name" => $user->name,
                "address" => $user->address,
                "email" => $user->email,
                "pay_limit" => $user->pay_limit,
                "admin" => $user->admin,
            ]);

        // viewのトップページに戻る
        return redirect('/');
    }
}
