<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">管理首頁</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            首頁
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            管理
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">管理{{ Auth::user()->name }}的公司</a></li>
            <li><a class="dropdown-item" href="#">管理{{ Auth::user()->name }}的產品</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            使用者操作
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('api.logout') }}">登出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>