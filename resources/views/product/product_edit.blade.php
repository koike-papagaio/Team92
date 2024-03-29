<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集画面</title>
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
    
    <!-- 商品編集 -->
    <div class="edit-container w-50">

        <h2 class="mb-5 text-center">商品編集</h2>

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

        <!-- 商品編集フォーム-->
        <form action="{{ url('product_edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="id" value="{{$item->id}}" hidden>
            <div class="form-group">
                <label for="select-category" class="form-label">カテゴリ</label>
                <select class="form-select w-100" id="select-category" name="category_id" required autofocus>
                    <option value="{{$item->category_id}}" selected>{{$item->category_name}}</option>
                    <!-- foreachでProduct_editControllerから渡された$categoriesを$categoryとして値を取り出す-->
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label for="product-name" class="form-label">商品名</label>
                <input type="text" name="name" value="{{$item->name}}" class="form-control" id="product-name" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="product-file" class="form-label">商品画像</label>
                <div class="image-area">
                    @if(empty($item->image1))
                    <p>画像が登録されていません</p>
                    <input type="file" name="image1" class="form-control product-file mb-3 p-0" id="product-file">
                    @else
                    <img src="{{$item->image1}}" alt="">
                    <input type="file" name="image1" class="form-control product-file mb-3 p-0" id="product-file">
                    @endif
                </div>
                <div class="image-area">
                    @if(empty($item->image2))
                    <p>画像が登録されていません</p>
                    <input type="file" name="image2" class="form-control product-file mb-3 p-0" id="product-file">
                    @else
                    <img src="{{$item->image2}}" alt="">
                    <input type="file" name="image2" class="form-control product-file mb-3 p-0" id="product-file">
                    @endif
                </div>
                <div class="image-area">
                    @if(empty($item->image3))
                    <p>画像が登録されていません</p>
                    <input type="file" name="image3" class="form-control product-file mb-3 p-0" id="product-file">
                    @else
                    <img src="{{$item->image3}}" alt="">
                    <input type="file" name="image3" class="form-control product-file mb-3 p-0" id="product-file">
                    @endif
                </div>
                <div class="image-area">
                    @if(empty($item->image4))
                    <p>画像が登録されていません</p>
                    <input type="file" name="image4" class="form-control product-file mb-3 p-0" id="product-file">
                    @else
                    <img src="{{$item->image4}}" alt="">
                    <input type="file" name="image4" class="form-control product-file mb-3 p-0" id="product-file">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="product-price" class="form-label">売価</label>
                <input type="text" name="price" value="{{$item->price}}" class="form-control" id="product-price" required>
            </div>

            <div class="form-group">
                <label for="product-detail" class="form-label">商品詳細</label>
                <textarea class="w-100" name="item_detail" id="product-detail" rows="5" maxlength="191" required>{{$item->item_detail}}</textarea>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="hidden" class="form-check-input" value="0" id="stop-selling-check" name="sales_status">
                    @if($item->sales_status == 1)
                    <input type="checkbox" class="form-check-input" value="1" id="stop-selling-check" name="sales_status" checked>
                    @else
                    <input type="checkbox" class="form-check-input" value="1" id="stop-selling-check" name="sales_status">
                    @endif
                    <label for="stop-selling-check" class="form-label">販売停止</label>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-secondary">編集</button>
            </div>
        </form>
    </div>
</body>

</html>