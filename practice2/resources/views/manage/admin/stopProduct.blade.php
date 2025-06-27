@extends("layout")
@section("main")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>管理產品</h1>
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.manage.product') }}" class="btn btn-primary">返回</a>
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
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            @if($product->status)
                                <td class="text-success">啟用</td>
                            @else
                                <td class="text-danger">停用</td>
                            @endif
                            <td>
                                @include("manage.admin.form.deleteProduct", [
                                    "title"=>"刪除產品",  
                                    "action"=>route("api.admin.manage.product.delete"),
                                    "method"=>"DELETE",
                                    "product"=>$product,
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection