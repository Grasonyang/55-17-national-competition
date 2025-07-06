@extends('layout')
@section('main')
    <div class="container p-5">
        <!-- <h1>公司管理</h1> -->
        <div class="d-flex align-items-center justify-content-between">
            <h1>產品管理</h1>
            <!-- add company -->
            <div>
                @if($isStop)
                    <a href="{{ route('product',['company_id'=>$company->id]) }}" class="btn btn-primary">返回</a>
                @else
                    @include('form.product.addOrEdit',[
                        "title"=>"新增產品",
                        "action"=>route('product.store',['company_id'=>$company->id]),
                        "method"=>"POST",
                        "product"=>null,
                        "company"=>$company,
                    ])
                    <a href="{{ route('product',['company_id'=>$company->id,'stop'=>true]) }}" class="btn btn-primary">查看停用產品</a>
                @endif
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">產品ID</th>
                    <th scope="col">產品名稱</th>
                    <th scope="col">產品狀態</th>
                    <th scope="col">管理操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->gtin }}</th>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if($product->status)
                                <p class="text-success">啟用中</p>
                            @else
                                <p class="text-danger">停用中</p>
                            @endif
                        </td>
                        <td>
                            @if($isStop)
                                @include('form.product.stopOrDelete',[
                                    "title"=>"刪除",
                                    "action"=>route('product.destroy',['company_id'=>$company->id,'product_id'=>$product->gtin]),
                                    "method"=>"delete",
                                ])
                            @else
                                @include('form.product.addOrEdit',[
                                    "title"=>"修改產品",
                                    "action"=>route('product.update',['company_id'=>$company->id,'product_id'=>$product->gtin]),
                                    "method"=>"put",
                                    "product"=>$product,
                                    "company"=>$company,
                                ])
                                @include('form.product.stopOrDelete',[
                                    "title"=>"停用",
                                    "action"=>route('product.stop',['company_id'=>$company->id,'product_id'=>$product->gtin]),
                                    "method"=>"patch",
                                ])
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
@endsection