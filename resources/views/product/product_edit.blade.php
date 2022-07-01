<!-- 商品編集 -->
<div class="edit-container w-50" style="margin: auto;">

    <h2 class="mb-3">商品編集</h2>

    <!-- 商品編集フォーム-->
    <form class="" action="/product_edit" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="select-category" class="form-label">カテゴリ</label>
            <select class="form-select w-100" id="select-category" name="category_id" required autofocus>
                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
            </select>
        </div>
        <div class="form-group ">
            <label for="product-name" class="form-label">商品名</label>
            <input type="text" name="name" value="{{$item->name}}" class="form-control" id="product-name" maxlength="50" required>
        </div>

        <!-- <div class="form-group">
            <label for="product-file" class="form-label">商品画像</label>
            <input type="file" name="image1" class="form-control mb-3 p-0" id="product-file" style="height:auto;" >
            <input type="file" name="image2" class="form-control mb-3 p-0" id="product-file" style="height:auto;" >
            <input type="file" name="image3" class="form-control mb-3 p-0" id="product-file" style="height:auto;" >
            <input type="file" name="image4" class="form-control mb-3 p-0" id="product-file" style="height:auto;" >
        </div> -->

        <div class="form-group">
            <label for="product-price" class="form-label">売価</label>
            <input type="text" name="price" value="{{$item->price}}" class="form-control" id="product-price" required>
        </div>

        <div class="form-group">
            <label for="product-detail" class="form-label">商品詳細</label>
            <textarea class="w-100" name="item-detail" id="product-detail" rows="5" maxlength="191" required>{{$item->item_detail}}</textarea>
        </div>

        <div class="form-check">
            
            <input type="checkbox" class="form-check-input" value="1" id="stop-selling-check" name="sales_status[]">
            <label for="stop-selling-check">販売停止</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success" style="width:100px;">編集</button>
        </div>
    </form>
</div>