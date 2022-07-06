<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録画面</title>
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
    <!-- 商品登録 -->
    <div class="register-container w-50">

        <h2 class="mb-3">商品登録</h2>

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

        <!-- 商品登録フォーム-->
        <form action="{{ url('product_register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="select-category" class="form-label">カテゴリ</label>
                <select class="form-select w-100" id="select-category" name="category_id" required autofocus>
                    <option value="" selected>カテゴリを選択してください</option>
                    <!-- foreachでProduct_editControllerから渡された$categoriesを$categoryとして値を取り出す-->
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group ">
                <label for="product-name" class="form-label">商品名</label>
                <input type="text" name="name" class="form-control" id="product-name" value="{{old('name')}}" placeholder="商品名を入力してください" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="product-file" class="form-label">商品画像</label>
                <input type="file" name="image1" class="form-control product-file mb-3 p-0" id="product-file">
                <input type="file" name="image2" class="form-control product-file mb-3 p-0" id="product-file">
                <input type="file" name="image3" class="form-control product-file mb-3 p-0" id="product-file">
                <input type="file" name="image4" class="form-control product-file mb-3 p-0" id="product-file">
            </div>

            <div class="form-group">
                <label for="product-price" class="form-label">売価</label>
                <input type="text" name="price" class="form-control" id="product-price" value="{{old('price')}}" placeholder="価格を入力してください" required>
            </div>

            <div class="form-group">
                <label for="product-detail" class="form-label">商品詳細</label>
                <textarea class="w-100" name="item_detail" id="product-detail" rows="5" placeholder="商品の詳細を入力してください" maxlength="191" required>{{old('item_detail')}}</textarea>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>
</body>

</html>