<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
</head>
<body>

    <div class="container m-5 p-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">標籤搜尋結果</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li> -->
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <h3>
            Result
        </h3>
        @foreach($currentTag as $tag)
            <ul class="list-group">
                @foreach($tags[$tag] as $tag1)
                    <li class="list-group-item"><a href="{{ route('go',['path'=>$tag1]) }}">{{$tag1}}</a></li>
                @endforeach
            </ul>
            
        @endforeach
        
    </div>

    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
</body>
</html>