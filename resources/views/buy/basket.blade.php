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
    
    <div class="zentai">
        <div class="body">
            <form action="{{ route('buy.basket')}}">
                <div class="midasi">
                    <h1>買い物かご</h1>
                </div>
                <div class="line">
                    <hr>
                </div>
                <table border="1" style="border-collapse: collapse">
                    <tr>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>商品合計</th>
                    </tr>
                    @foreach ($carts as $cart)
                        <tr>
                            <td><img src="{{ $cart->image1 }}"> 
                                {{$cart->item_name}}
                                <a href="{{ url('/basket/'.$cart->id) }}">削除</a>
                            </td>                
                            <td>{{$cart->price}}円</td>
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->price * $cart->quantity}}円</td>
                        </tr>
                    @endforeach
                        <tr align="right">
                            <th colspan="4">合計金額:{{$money->total}}円</th>
                        </tr>
                        <div class="button">
                            <a href="{{ route('index')}}">お買い物を続ける</a>
                            <a href="{{ route('buy.confirmation')}}">購入手続きへ進む</a>
                        </div> 
                </table>
            </form>
        </div>
    </div>
</body>
       