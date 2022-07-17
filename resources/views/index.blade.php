<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>トップ</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
    <!-- ヘッダー読み込み -->
    <x-Header/>

    <div class="top-container">
        <div class="main-shop-title">
            <h1>ショップ92</h1>
        </div>
        
        <div class="form-container">
            <form action="{{ route('index') }}" method="GET" class="d-flex justify-content-center">
                <div class="category-select">
                    <select class="form-select" name="categoryId" value="{{ $categoryId }}">
                        <option value="">すべて</option>

                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input class="form-control search-text" type="text" name="keyword" value="{{$keyword}}" autocomplete="off">
                <input class="btn btn-secondary search-btn" type="submit" value="検索">
            </form>
        </div>
    </div>

    <div class="product-container">
        <div class="product-list-top">
            <div>
                <p class="item-count">表示結果 {{ $item->count() }} 件</p>
            </div>
            <div class="sort">
                <form id="order-form" action="{{ route('index' )}}" method="GET">
                    <select class="form-select" name="order" id="order">
                        <option value="desc" {{ $order == 'desc' ? 'selected': '' }}>新着順</option>
                        <option value="asc" {{ $order == 'asc' ? 'selected': '' }}>古い順</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="">
            <ul class="product-list">
                @forelse ($item as $value)
                    <li class="product"><a href="/product_detail/{{$value->id}}">
                        <img class="product-image" src="{{ $value->image1 }}" alt="画像">
                        <div class="product-body">
                            <p>{{$value->name}}</p>
                            <p>¥{{$value->price}}</p>
                        </div>
                    </a></li>
                @empty
                    <p>該当する商品はありません</p>
                @endforelse
            </ul>
        </div>

        <!-- ページネーション -->
        <div class="d-flex justify-content-center pb-5">
            {{ $item->appends(request()->input())->links() }}
        </div>
        <!-- ページネーションend -->
    </div>

    <script>
        $(function() {
            $('#order').change(function(){
                $('#order-form').submit();
            });
        });
    </script>
</body>
</html>