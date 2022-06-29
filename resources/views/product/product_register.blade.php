<!-- 商品登録 -->
<div class="register-container w-50" style="margin: auto;">

    <h2 class="mb-3">商品登録</h2>

    <!-- 商品登録フォーム-->
    <form action="/product_register" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="select-category" class="form-label">カテゴリ</label>
            <select class="form-select w-100" id="select-category" name="category_id" required autofocus>
                <option value="">カテゴリを選択してください</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group ">
            <label for="product-name" class="form-label">商品名</label>
            <input type="text" name="name" class="form-control" id="product-name" placeholder="商品名を入力してください" maxlength="50" required>
        </div>

        <!-- <div class="form-group">
            <label for="product-file" class="form-label">商品画像</label>
            <input type="file" name="image1" class="form-control mb-3 p-0" id="product-file" style="height:auto;">
            <input type="file" name="image2" class="form-control mb-3 p-0" id="product-file" style="height:auto;">
            <input type="file" name="image3" class="form-control mb-3 p-0" id="product-file" style="height:auto;">
            <input type="file" name="image4" class="form-control mb-3 p-0" id="product-file" style="height:auto;">
        </div> -->

        <div class="form-group">
            <label for="product-price" class="form-label">売価</label>
            <input type="text" name="price" class="form-control" id="product-price" placeholder="税込み価格で入力してください" required>
        </div>

        <div class="form-group">
            <label for="product-detail" class="form-label">商品詳細</label>
            <textarea class="w-100" name="item_detail" id="product-detail" rows="5" placeholder="商品の詳細を入力してください" maxlength="191" required></textarea>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success" style="width:100px;">登録</button>
        </div>
    </form>
</div>