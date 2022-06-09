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
                @foreach ($buys as $buy)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                        <div>{{ $buy->id }}</div>
                    </td>

                    <td>
                        <!-- TODO: 削除ボタン -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>