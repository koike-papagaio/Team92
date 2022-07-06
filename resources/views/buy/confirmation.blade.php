<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入確認画面</title>
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
            <div class="midasi">
                <h1>ご購入確認</h1>
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
                    <td>
                        <img src="{{ $cart->image1 }}"> 
                        {{$cart->item_name}}
                    </td>
                    <td>{{$cart->price}}円</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price * $cart->quantity}}円</td>
                </tr>
                @endforeach
                <tr align="right">
                    <th colspan="4">合計金額:{{$aa->total}}円</th>
                </tr>            
            </table>
        </div>
        <div class="midasi">
            <h1>お客様情報</h1>
        </div>
        <div class="line">
            <hr>
        </div>
        <form action="{{ route('buy.completed')}}">
            @csrf
            @foreach ($users as $user)
            <div>
                <div class="text">
                    お名前<br>
                    {{$user->name}}<br>
                    住所<br>
                    {{$user->address}}<br>
                    メールアドレス<br>
                    {{$user->email}}<br>
                </div>
                @endforeach
                <div class="choice">
                    <label for="radio01" class="text">お支払方法の選択</label><br>
                    <input class="form-check-input" class="form-check-input" type="radio" id="inlineRadio01" name="radioGrp01" value="1">
                    <label for="inlineRadio01" class="form-check-label">代引き</label>
                    <input class="form-check-input" class="form-check-input" type="radio" id="inlineRadio02"  name="radioGrp01" value="2" checked="checked">
                    <label for="inlineRadio02" class="form-check-label">コンビニ支払い</label>
                    <input class="form-check-input" class="form-check-input" type="radio" id="inlineRadio03"  name="radioGrp01" value="3">
                    <label for="inlineRadio03" class="form-check-label">クレジット</label>
                </div>
            </div>
            <div class="button">
                <a href="{{ route('buy.basket')}}">戻る</a>
                <input type="submit" method="post" value="ご注文を確定する"></button>
            </div>
        </form>
    </div>
</body>

