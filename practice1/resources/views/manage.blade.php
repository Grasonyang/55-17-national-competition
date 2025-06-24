@extends("layout")
@section("content")
    <div class="container mt-5">
        <h2 class="fw-bold text-center">歡迎來到管理頁面</h2>
        <div class="btn-group d-flex justify-content-center mt-4">
            @if(Auth::check() && Auth::user()->role == "admin")
                <a href="{{ route('page.manage.users') }}" class="btn btn-primary">使用者管理→</a>
                <a href="{{ route('page.manage.companys') }}" class="btn btn-success">公司管理→</a>
            @endif
            <a href="{{ route('page.manage.products') }}" class="btn btn-warning">產品管理→</a>
        </div>
        @if(Auth::check() && Auth::user()->role == "admin")
            <section class="mt-3">
                <h3>使用者</h3>
            </section>
            <section class="mt-3">
                <h3>公司</h3>
            </section>
        @endif
        <section class="mt-3">
            <h3>使用者</h3>
        </section>
    </div>
@endsection