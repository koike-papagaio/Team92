<head>
    <title>買い物かご画面</title>
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
       