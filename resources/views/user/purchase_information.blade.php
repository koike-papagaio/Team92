<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入情報管理画面</title>
</head>
<body>
    <!-- 表題 -->
    <div>購入情報管理</div>
    <!-- テーブル -->
    <div>        
        <table class="table table-striped task-table">

            <!-- テーブル本体 -->
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>購入ID</td>
                    <td>購入日</td>
                    <td>名前</td>
                    <td>住所</td>
                    <td>メールアドレス</td>
                    <td>商品名</td>
                    <td>値段</td>
                    <td>数量</td>
                    <td>支払い方法</td>
                    <td>発注状況</td>
                </tr>

                @foreach ($buys as $buy)
                <tr>
                    <!-- タスク名 -->
                    <td>{{ $buy->id }}</td>
                    <td>{{ $buy->bought_num }}</td>
                    <td>{{ $buy->created_at }}</td>
                    <td>{{ $buy->user_name }}</td>
                    <td>{{ $buy->address }}</td>
                    <td>{{ $buy->email }}</td>
                    <td>{{ $buy->item_name }}</td>
                    <td>{{ $buy->price }}</td>
                    <td>{{ $buy->quantity }}</td>
                    <td>{{ $buy->payment }}</td>
                    <td><button type="button">発注未</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>