@extends("layout")
@section("content")
    <div class="container mt-5">
        <h2 class="fw-bold text-center">歡迎來到管理頁面</h2>
        <div class="btn-group d-flex justify-content-center mt-4">
            @if(Auth::check() && Auth::user()->role == "admin")
                <a href="{{ route('page.manage.users') }}" class="btn btn-primary">使用者管理→</a>
            @endif
            @if(Auth::check() && Auth::user()->role == "user")
                <a href="{{ route('page.manage.companys', ['user_id'=>Auth::user()->id]) }}" class="btn btn-secondary">公司管理→</a>
            @else
                <a href="{{ route('page.manage.companys') }}" class="btn btn-secondary">公司管理→</a>
            @endif
            @if(Auth::check() && Auth::user()->role == "user")
                <a href="{{ route('page.manage.products', ['user_id'=>Auth::user()->id]) }}" class="btn btn-warning">產品管理→</a>
            @else
                <a href="{{ route('page.manage.products') }}" class="btn btn-warning">產品管理→</a>
            @endif
            
        </div>
    </div>
@endsection