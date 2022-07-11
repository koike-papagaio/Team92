<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>買い物かご画面</title>
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
    
    <div class="basket-container">
        <div class="basket-top">
            <h2>買い物かご</h2>
        </div>

        <div class="basket-main">
            <form action="{{ route('buy.basket')}}">
                <table class="table table-bordered">
                    <tr>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>商品合計</th>
                    </tr>
                    @foreach ($carts as $cart)
                        <tr>
                            <td class="basket-item">
                                <img class="basket-img" src="{{ asset('testimg/testimg.png') }}"> <!-- $cart->image1 -->
                                <p class="basket-item-name">{{$cart->item_name}}</p>
                                <a class="basket-delete" href="{{ url('/basket/'.$cart->id) }}">削除</a>
                            </td>                
                            <td>{{$cart->price}}円</td>
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->price * $cart->quantity}}円</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th colspan="4" class="basket-total-price">合計金額:{{$money->total}}円</th>
                        </tr>
                        
                </table>
                <div class="basket-btn">
                    <a class="btn btn-outline-secondary" href="{{ route('index')}}">お買い物を続ける</a>
                    <a class="btn btn-outline-secondary" href="{{ route('buy.confirmation')}}">購入手続きへ進む</a>
                </div> 
            </form>
        </div>
    </div>
</body>
       