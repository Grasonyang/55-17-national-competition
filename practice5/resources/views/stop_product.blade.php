@extends('layout')
@section('main')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>停用產品管理頁面</h2>
            
            <div>
                <a href="{{ route('product.show',['company_id'=>$company_id ?? null]) }}" class="btn btn-primary">返回</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">公司ID</th>
                    <th scope="col">產品名稱</th>
                    <th scope="col">產品狀態</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->gtin }}</th>
                        <td>{{ $product->company->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if($product->status)
                                啟用
                            @else
                                停用
                            @endif
                        </td>
                        <td>
                            @include('form.product.deleteOrStop',[
                                "title"=>"刪除",
                                "type"=>"dele",
                                "product"=>$product,
                                "method"=>"DELETE",
                                "action"=>route('product.dele', ['product_id'=>$product->gtin]),
                                "company_id"=>$company_id ?? null,
                                "companies"=>$companies ?? null,
                            ])
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
@section('script')

@endsection
