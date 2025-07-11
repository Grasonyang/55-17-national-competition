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
                <a class="navbar-brand" href="#" tabindex="0"><h1>目錄列表</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="主選單控制按鈕">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> -->
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
        <h1>當前目錄: {{ $curentFolderName=='' ? 'home':$curentFolderName }}</h1>
        <nav aria-label="麵包屑" tabindex="0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('go') }}" class="folder-link" tabindex="0">Home</a></li>
                @foreach($breads as $bread)
                    <li class="breadcrumb-item"><a href="{{ route('go',['path'=>$bread['path'] ]) }}" class="folder-link" tabindex="0">{{ $bread['show'] }}</a></li>
                @endforeach
            </ol>
        </nav>
        <div class="container">
            <h2>子文件夾列表</h2>
            <ul class="list-group">
                @if(count($folders)==0)
                    <li class="list-group-item">沒有子文件夾</li>
                @else
                    @foreach($folders as $folder)
                        <li class="list-group-item"><a href="{{ route('go',['path'=>$folder['path'] ]) }}" class="folder-link" tabindex="0">{{ $folder['show'] }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="container">
            <h2>子檔案列表</h2>
            <ul class="list-group">
                @if(count($files)==0)
                    <li class="list-group-item">沒有子文件</li>
                @else
                    @foreach($files as $file)
                        <li class="list-group-item"><a href="{{ route('go',['path'=>$file['path'] ]) }}" class="file-link" tabindex="0">{{ $file['show'] }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </main>
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
        let src = "";

        $(".file-link").attr("draggable", true);

        $(".file-link").on("dragstart", function(e){
            src = $(this).attr("href");
            e.originalEvent.dataTransfer.setData("text/plain", src);
            e.originalEvent.dataTransfer.effectAllowed = "move";
        });

        // 必做！允許拖放目標接收 drop
        $(".folder-link").on("dragover", function(e){
            e.preventDefault();
            e.originalEvent.dataTransfer.dropEffect = "move";
        });

        // drop 處理
        $(".folder-link").on("drop", function(e){
            e.preventDefault();
            des = $(this).attr("href");
            alert(`從 ${src} 搬到 ${des}`);
        });
    </script>
</body>
</html>