<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid me-5">
        <a class="navbar-brand" href="{{ route('home') }}">產品管理系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">產品頁面</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">GTIN批次驗證頁面</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        使用者
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.logout') }}">登出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>