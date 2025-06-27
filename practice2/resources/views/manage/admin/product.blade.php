@extends("layout")
@section("main")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>管理產品</h1>
            <ul class="nav">
                <li>
                    @include("manage.admin.form.addProduct", [
                        "title"=>"新增產品",  
                        "action"=>route("api.admin.manage.product.add"),
                        "method"=>"POST",
                    ])
                </li>
                <li>
                    <a href="{{ route('admin.manage.stop.product') }}" class="btn btn-primary">查看停用產品</a>
                </li>
            </ul>
        </div>
        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>產品名稱</td>
                        <td>產品狀態</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)

                        <tr>
                            <td>{{ $product->gtin }}</td>
                            <td>{{ $product->name }}</td>
                            @if($product->status)
                                <td class="text-success">啟用</td>
                            @else
                                <td class="text-danger">停用</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.manage.one.product', ['gtin'=>$product->gtin]) }}">管理產品</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection