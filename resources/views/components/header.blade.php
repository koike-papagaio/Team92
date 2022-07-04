<header class="navbar navbar-light bg-light">

    <a href="{{ route('index') }}" class="navbar-brand d-block ms-3">ショップ92</a>
    
    @if (Session::has('id'))
        @if(Session::get('admin') === 1)
            <!-- 管理者画面
            <header class="navbar navbar-light bg-light">

                <a href="" class="navbar-brand d-block ms-3">ショップ92</a>
    
                <div class="dropdown pe-5">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">商品管理/a></li>
                        <li><a class="dropdown-item" href="#">商品登録</a></li>
                        <li><a class="dropdown-item" href="#">購入情報管理</a></li>
                        <li><a class="dropdown-item" href="#">ログアウト</a></li>
                    </ul>
                </div>

            </header> -->

        @else
            <!-- ログイン後
            <header class="navbar navbar-light bg-light">

                <a href="" class="navbar-brand d-block ms-3">ショップ92</a>
    
                <div class="dropdown pe-5">
                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    様
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">会員編集</a></li>
                        <li><a class="dropdown-item" href="#">購入履歴</a></li>
                        <li><a class="dropdown-item" href="#">ログアウト</a></li>
                    </ul>
                </div>

                    カートアイコン 

            </header> -->
        @endif
    @else
    <div class="dropdown pe-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            未登録会員様
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">会員登録</a></li>
            <li><a class="dropdown-item" href="#">ログイン</a></li>
        </ul>
    </div>
    @endif

</header>
