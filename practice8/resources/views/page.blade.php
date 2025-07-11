<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" tabindex="0"><h1 class="fs-3 fs-lg-1">{{ $file['show'] }}</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="主選單控制按鈕">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('go') }}">Home</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" tabindex="0">
                        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="搜尋輸入，關鍵字以逗號分隔" tabindex="0">
                        <button class="btn btn-outline-success" type="submit" aria-label="搜尋按鈕" tabindex="0">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex flex-column align-items-center justify-content-center">
        <div class="container-fluid position-relative p-0">
            <div id="cover-mask"></div>
            <img src="{{ $file['info']['cover'] }}" alt="cover image" id="cover-image" class="w-100">
            
            <h1 class="position-absolute top-100 start-50 translate-middle 
                    p-2 p-md-4 fs-3
                    bg-dark text-white fw-bold w-100 w-lg-25 text-center" id="cover-title">
                {{ $file['info']['title'] }}
            </h1>
        </div>
        <div class="container mt-5">
            <h2>{{ $file['info']['title'] }}</h2>
            <p id="main-article">
                {!!$file['info']['content']!!}
            </p>
        </div>
    </main>
    <footer class="bg-dark mt-5 p-5 text-white">
        aaa
    </footer>
    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    <script>
        $("form[role='search']").on("submit", function(e){
            e.preventDefault();
            let keyword = $("#search").val();
            keyword = keyword.split(',');
            keyword = keyword.map(function(item){
                return item.trim();
            });
            keyword = [...new Set(keyword)];
            keyword = keyword.join('/');
            location.href = `{{ route('search', ['search' => '__REPLACE__']) }}`.replace('__REPLACE__', encodeURIComponent(keyword));
        });
        $("#cover-mask").on('mousemove',function(e){
            let x = e.offsetX;
            let y = e.offsetY;
            $(this).css({
                'background': `radial-gradient(circle at ${x}px ${y}px, transparent, black 300px)`
            });
        })
        $("#cover-mask").on('mouseleave',function(e){
            $(this).css({
                'background': `transparent`
            });
        })
    </script>
</body>
</html>