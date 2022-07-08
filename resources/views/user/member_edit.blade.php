<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員編集画面</title>
   <!-- CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
    <!-- ヘッダー読み込み -->
    <x-Header/>
    <!-- 会員編集 -->
    <div class="member-container w-50" style="margin: auto;">

        <!-- バリデーションのエラーメッセージ -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- 会員編集フォーム-->
        <form action="{{ url('member_edit') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="id" value="{{$user->id}}" hidden>
            <div class="form-group ">
                <label for="user-name" class="form-label">お名前</label>
                <input type="text" name="name" class="form-control member-information" id="user-name" value="{{$user->name}}" maxlength="30" required autofocus>
            </div>

            <div class="form-group">
                <label for="user-address" class="form-label">住所</label>
                <input type="text" name="address" class="form-control member-information" id="user-address" value="{{$user->address}}" maxlength="191" required>
            </div>

            <div class="form-group">
                <label for="user-email" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control member-information" id="user-email" value="{{$user->email}}" maxlength="191" required>
            </div>

            <div class="form-group">
                <label for="user-password" class="form-label">パスワード</label>
                <input type="password" name="password" class="form-control member-information" id="user-password" placeholder="パスワードを変更する場合入力してください" maxlength="128">
            </div>

            <div class="form-group">
                <label for="user-pay_limit" class="form-label">使用限度額の設定</label>
                <input type="text" name="pay_limit" class="form-control member-information" id="user-pay_limit" value="{{$user->pay_limit}}" required>
            </div>

            <div class="form-group text-center edit-btn">
                <button type="submit" class="btn btn-success" style="width:100px;">変更する</button>
                <button class="btn btn-success" style="width:100px;"><a href="/">戻る</a></button>
            </div>
        </form>
    </div>
</body>

</html>