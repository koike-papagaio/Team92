<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class Member_registerController extends Controller
{
    //
    public function index()
    {
        // member_registerのviewを返す
        return view('user/member_register');
    }

    public function register(Request $request)
    {
        // バリデーション実行
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required','string','max:30'],
                'address' => ['required','string','max:191'],
                'email' => ['required','email:rfc,dns','string','max:191','unique:users'],
                'password' => ['required','string','max:128'],
                'pay_limit' => ['required','integer'],
            ],
        );

        // バリデーションで引っかかった場合
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //  Modelsを呼び出す
        $user = new User();

        // データを代入する
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->pay_limit = $request->pay_limit;
        $user->admin = config('const.admin.general');

        // データを保存する
        $user->save();

        // viewの'/login'に戻る
        return redirect('/login');
    }
}
