<!-- 商品管理画面 -->
<div class="management-container" style="margin: auto;">

    <h2 class="mb-3">商品管理</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">カテゴリ</th>
                <th scope="col">商品名</th>
                <th scope="col">売価</th>
                <th scope="col">商品詳細</th>
                <th scope="col">販売状況</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $value)
            <tr>
                <td scope="row">{{$value->id}}</td>
                <td>{{$value->category_id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}円</td>
                <td>{{$value->item_detail}}</td>
                <td>{{$value->sales_status}}</td>
                <td><button><a href="/product_edit/{{$value->id}}">編集</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>