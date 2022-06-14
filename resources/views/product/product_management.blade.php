<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理画面</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- CSS読み込み publicフォルダから-->
    <link rel="stylesheet" href="{{asset('')}}">
</head>

<body>
    <!-- ヘッダー読み込み -->
    <!-- <x-Header> -->

    <!-- 商品管理画面 -->
    <div class="management-container" style="margin: auto;">

        <h2 class="mb-3">商品管理</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">カテゴリ</th>
                    <th scope="col">商品名</th>
                    <th scope="col">商品画像</th>
                    <th scope="col">売価</th>
                    <th scope="col">商品詳細</th>
                    <th scope="col">販売状況</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-content">
                @foreach($items as $value)
                <tr>
                    <td scope="row">{{$value->id}}</td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->image1}}</td>
                    <td>{{$value->price}}円</td>
                    <td>{{$value->item_detail}}</td>
                    @if($value->sales_status == 0)
                    <td>販売中</td>
                    @else
                    <td>販売停止</td>
                    @endif
                    <td><button><a href="/product_edit/{{$value->id}}">編集</a></button></td>
                    <td><button><a href="/product_delete/{{$value->id}}">削除</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('td:contains("販売停止")').parent("tr").css("background-color", "#FFDBC9");
    </script>
</body>

</html>