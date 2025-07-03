@extends('layout')
@section('main')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>產品管理頁面</h2>
            
            <div>
                @include('form.product.addOrEdit',[
                    "title"=>"新增產品",
                    "type"=>"add",
                    "product"=>null,
                    "method"=>"POST",
                    "company_id"=>$company_id ?? null,
                    "companies"=>$companies ?? null,
                    "action"=>route('product.add')
                ])
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
                        <th scope="row">{{ $product->id }}</th>
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
                            @include('form.product.addOrEdit',[
                                "title"=>"修改產品",
                                "type"=>"edit",
                                "product"=>$product,
                                "method"=>"PUT",
                                "action"=>route('product.edit', ['product_id'=>$product->gtin]),
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
