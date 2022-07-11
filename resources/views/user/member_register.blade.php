<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <!-- 会員登録 -->
    <div class="member_register-container w-50">

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

        <!-- 会員登録フォーム-->
        <form action="{{ url('member_register') }}" method="POST">
            @csrf
            <div class="form-group ">
                <label for="user-name" class="form-label">お名前</label>
                <input type="text" name="name" class="form-control member-information" id="user-name" value="{{old('name')}}" placeholder="お名前を入力してください" maxlength="30" required autofocus>
            </div>

            <div class="form-group">
                <label for="user-address" class="form-label">住所</label>
                <input type="text" name="address" class="form-control member-information" id="user-address" value="{{old('address')}}" placeholder="住所を入力してください" maxlength="191" required>
            </div>

            <div class="form-group">
                <label for="user-email" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control member-information" id="user-email" value="{{old('email')}}" placeholder="メールアドレスを入力してください" maxlength="191" required>
            </div>

            <div class="form-group">
                <label for="user-password" class="form-label">パスワード</label>
                <input type="password" name="password" class="form-control member-information" id="user-password" value="{{old('password')}}" placeholder="パスワードを入力してください" maxlength="128" required>
            </div>

            <div class="form-group">
                <label for="user-pay_limit" class="form-label">使用限度額の設定</label>
                <input type="text" name="pay_limit" class="form-control member-information" id="user-pay_limit" value="{{old('pay_limit')}}" placeholder="使用限度額を入力してください" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-secondary">会員登録</button>
            </div>
        </form>
    </div>
</body>

</html>