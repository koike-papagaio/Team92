<head>
    <title>購入完了画面</title>
</head>


<body>
    <div class="zentai">
        ----------
        ヘッダー
        ----------
        <div class="body">
            <form action="{{ route('buy.completed')}}">
                <div class="moji">
                    <div class="ty">
                        Thank You!
                    </div>
                    ご注文が完了しました！
                </div>
                <div class="button">
                    <a href="{{ route('buy_history')}}">購入履歴を確認する</a>
                    <a href="{{ route('views.index')}}">ホームへ戻る</a>
                </div>
            </form>
        </div>
    </div>
</body>
