<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入情報管理画面</title>
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
    <!-- 表題 -->
    <div>購入情報管理</div>

    
        <!-- <input type="text" placeholder="キーワードを入力してください">
        <button type="button">検索</button> -->
        
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
                    <!-- <td>発注状況</td> -->
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
                    <!-- 支払い方法 -->
                    @if($buy->payment == 1)
                    <td>代引き</td>
                    @elseif($buy->payment == 2)
                    <td>コンビニ支払い</td>
                    @elseif($buy->payment == 3)
                    <td>クレジットカード</td>
                    @endif

                    <!-- 発注状況
                    @if($buy->status == 0)
                    <td>
                        <form method="post" action="{{ url('/purchase_information/update/{id}') }}" >
                        @csrf    
                            <input type="submit" value="発注未">
                        </form>
                    </td>
                    @else
                    <td>    
                        <button type="button" name="add">発注済</button>
                    </td>
                    @endif -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>