<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS読み込み publicフォルダから-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ヘッダー読み込み -->
    <x-Header/>

    <!-- ログイン -->
    <div class="login-container w-50">

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

        <!-- ログインのエラーメッセージ -->
        @if (isset($login_error))
        <div class="alert alert-danger">
            <ul>
                <li>メールアドレスまたはパスワードが一致しません。</li>
            </ul>
        </div>
        @endif

        <!-- ログインフォーム-->
        <form action="{{ url('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user-email" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="user-email" placeholder="メールアドレスを入力してください" maxlength="191" required autofocus>
            </div>

            <div class="form-group">
                <label for="user-password" class="form-label">パスワード</label>
                <input type="password" name="password" class="form-control" id="user-password" placeholder="パスワードを入力してください" maxlength="128" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">ログイン</button>
            </div>
        </form>
    </div>
</body>

</html>