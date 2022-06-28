<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class LoginController extends Controller
{
    //
    public function index()
    {
        // loginのviewを返す
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email:rfc,dns|max:191',
                'password' => 'required|string|max:128',
            ],
        );

        // バリデーションで引っかかった場合
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        //  usersテーブルのemailが入力されたものと同じユーザーを呼び出す
        $user = User::where('email', '=', $request->email)->first();

        // ユーザーが存在しない場合，viewの'/login'に戻る
        if (!isset($user)) {
            return view('auth/login',['login_error' => '1']);
        }

        // パスワードが一致した場合
        if (Hash::check($request->password, $user->password)) {

            //セッションをセット(idとadmin)
            $request->session()->put([
                "id" => $user->id,
                "admin" => $user->admin,
            ]);

            // 管理者の場合
            if ($user->admin == 1) {
                // 商品管理画面に遷移
                return redirect('/product_management');
            } else {
                // 一般ユーザーの場合は商品一覧画面に遷移
                return redirect('/');
            }
        } else {
            // viewの'/login'に戻る
            return view('auth/login',['login_error' => '1']);
        }
    }
}
