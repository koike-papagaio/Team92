<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>商品詳細</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
    <x-Header/>

    <div class="top-container">
        <h1>ショップ92</h1>
    </div>

    <div class="detail-container">
        <div class="detail-left">
            <div class="mainImage mainItem">
                <img src="{{ asset('testimg/testimg.png') }}" alt="">
            </div>
            <div class="thumbnails subItem">
                <img src="{{ asset('testimg/testimg2.png') }}" alt="">
                <img src="{{ asset('testimg/testimg3.png') }}" alt="">
                <img src="{{ asset('testimg/testimg4.png') }}" alt="">
                <img src="{{ asset('testimg/testimg5.png') }}" alt="">
                <img src="{{ asset('testimg/testimg6.png') }}" alt="">
            </div>
        </div>

        <div class="detail-right">
            <div class="item-name">
                <p>{{$item->name}}</p>
            </div>

            <div class="item-price">
                <p>¥{{$item->price}}</p>
            </div>

            <form class="item-form" method="post" action="{{ route('add.basket') }}">
                @csrf
                <select class="form-select item-quantity" name="quantity" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input class="btn btn-outline-secondary" type="submit" value="カートに追加">
            </form>

            <div class="explanation">
                <div class="explanation-title">
                    <h2>商品説明</h2>
                </div>

                <p>{{$item->item_detail}}</p>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $('.subItem img').click(function(){
                // サムネイルの取得
                let $thisImg = $(this).attr('src');
                let $thisAlt = $(this).attr('alt');

                // メインイメージの取得
                let $mainImg = $(".mainItem img").attr('src');
                let $mainAlt = $(".mainItem img").attr('alt');

                // メインイメージを一度非表示にする（アニメーション付与のため）
                $('.mainItem img').hide();

                // メインイメージとサムネイルを切り替える
                $('.mainItem img').attr({src:$thisImg,alt:$thisAlt}).fadeIn(500);
                $(this).attr({src:$mainImg,alt:$mainAlt});
            });
        });
    </script>
</body>
</html>