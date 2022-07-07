<header class="bg-light">

    <a href="{{ route('index') }}" class="d-block">ショップ92</a>

    @if (Session::has('id'))
    @if(Session::get('admin') === 1)
    <!-- 管理者画面 -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Session::get('name') }} 様
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/product_management">商品管理</a></li>
            <li><a class="dropdown-item" href="/product_register">商品登録</a></li>
            <li><a class="dropdown-item" href="/purchase_information">購入情報管理</a></li>
            <li><a class="dropdown-item" href="/logout">ログアウト</a></li>
        </ul>
    </div>
    @else
    <!-- 会員画面 -->

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Session::get('name') }} 様
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/member_edit/{{ Session::get('id') }}">会員編集</a></li>
            <li><a class="dropdown-item" href="#">購入履歴</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">ログアウト</a></li>
        </ul>
    </div>

    <!-- カートアイコン -->

    @endif
    @else
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            未登録会員様
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/member_register">会員登録</a></li>
            <li><a class="dropdown-item" href="/login">ログイン</a></li>
        </ul>
    </div>
    @endif

</header>