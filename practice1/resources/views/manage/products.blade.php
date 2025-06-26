@extends("layout")
@section("content")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="fw-bold text-center">產品管理頁面</h2>
            <ul class="nav">
                <li class="nav-item">
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#addProduct">
                        新增產品
                    </button>
                    @if(isset($user))
                        @if(isset($company))
                            @include("manage.form.product.addProduct", ["user"=>$user, "company"=>$company])
                        @else
                            @include("manage.form.product.addProduct", ["user"=>$user, "companys"=>$companys])
                        @endif
                    @elseif(!isset($user))
                        @if(isset($company))
                            @include("manage.form.product.addProduct", ["company"=>$company])
                        @else
                            @include("manage.form.product.addProduct", ["companys"=>$companys])
                        @endif
                    @endif
                </li>
                <li class="nav-item">
                    <a href="" class="btn btn-primary">查看停用產品</a>
                </li>
                @if(!isset($user))
                <li class="nav-item">
                    <a href="" class="btn btn-primary">查看刪除產品</a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('page.manage') }}" class="btn btn-secondary">返回</a>
                </li>
            </ul>
        </div>
        @if(session('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th style="min-width:100px">GTIN</th>
                        <th style="min-width:200px;">所屬公司</th>
                        <th style="min-width:200px;">名稱</th>
                        <th style="min-width:200px;max-width:500px;overflow-x:auto">描述</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->gtin }}</td>
                            <td>{{ $product->company->company_name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showProduct-{{ $product->id }}">查看產品詳細資料</button>
                                @include("manage.form.product.showProduct", ["product"=>$product])
                                <button class="btn btn-primary">修改產品</button>
                                @if(isset($user))
                                    @if(isset($company))
                                        @include("manage.form.product.addProduct", ["user"=>$user, "company"=>$company])
                                    @else
                                        @include("manage.form.product.addProduct", ["user"=>$user, "companys"=>$companys])
                                    @endif
                                @elseif(!isset($user))
                                    @if(isset($company))
                                        @include("manage.form.product.addProduct", ["company"=>$company])
                                    @else
                                        @include("manage.form.product.addProduct", ["companys"=>$companys])
                                    @endif
                                @endif
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection