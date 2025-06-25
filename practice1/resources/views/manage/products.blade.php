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
                    @if($companys!==null)
                        @include('manage.form.product.addProduct', ["companys"=>$companys])
                    @elseif($company!==null)
                        @include('manage.form.product.addProduct', ["company"=>$company])
                    @endif
                </li>
                <li class="nav-item">
                    <a href="" class="btn btn-primary">查看停用產品</a>
                </li>
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
                        <th style="min-width:200px;">名稱</th>
                        <th style="min-width:200px;max-width:500px;overflow-x:auto">描述</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    
@endsection