<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>購入履歴画面</title>

</head>
<body>
    <!-- 表題 -->
    <div>

        <h1>購入履歴</h1>
        <div>誰々さんの購入履歴</div>
    </div>
    <!-- 購入期間選択 -->
    <div>
        <div>購入時期</div>
        
        <table class="table table-striped task-table">

            <!-- テーブル本体 -->
            <tbody>
                <tr>
                    <td>購入日</td>
                    <td>合計金額</td>
                    <td>商品名</td>
                    <td>値段</td>
                    <td>数量</td>
                    <td>支払い方法</td>
                    <td>発注状況</td>
                </tr>

                @foreach ($buys as $buy)
                <tr>
                    <!-- タスク名 -->                    
                    <td>{{ $buy->created_at }}</td>
                    <td>{{ $buy->price * $buy->quantity }}</td>
                    <td>{{ $buy->item_name }}</td>
                    <td>{{ $buy->price }}</td>
                    <td>{{ $buy->quantity }}</td>
                    <td>{{ $buy->payment }}</td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>