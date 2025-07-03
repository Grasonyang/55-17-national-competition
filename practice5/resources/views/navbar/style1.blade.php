<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">主頁</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5 me-5">
        <li class="nav-item">
          <a class="nav-link" href="#">公開 GTIN 批量驗證頁面</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">公開產品頁面 </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            使用者操作
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('page.login') }}">登入</a></li>
            <li><a class="dropdown-item" href="{{ route('page.register') }}">註冊</a></li>
          </ul>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </div>
</nav>