<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理画面</title>
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

    <!-- 商品管理画面 -->
    <div class="management-container w-100">

        <h2 class="mb-5 text-center">商品管理</h2>

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
                <!-- foreachでProduct_managementControllerから渡された$itemsを$valueとして値を取り出す-->
                @foreach($items as $value)
                <tr>
                    <td scope="row">{{$value->id}}</td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->name}}</td>
                    @if(empty($value->image1))
                    <td>画像が登録されていません</td>
                    @else
                    <td><img src="{{$value->image1}}" alt=""></td>
                    @endif
                    <td>{{$value->price}}円</td>
                    <td>{{$value->item_detail}}</td>
                    @if($value->sales_status == 0)
                    <td>販売中</td>
                    @else
                    <td>販売停止</td>
                    @endif
                    <td><button class="btn btn-secondary"><a href="/product_edit/{{$value->id}}">編集</a></button></td>
                    <td><button class="btn btn-danger"><a href="/product_delete/{{$value->id}}">削除</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // tdタグの中に"販売停止"という文字列が含まれているとき，そのtdタグの親要素であるtrタグのcssを変更する
        $('td:contains("販売停止")').parent("tr").css("background-color", "#FFDBC9");
    </script>
</body>

</html>