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
                <a class="navbar-brand" href="#">當前資料夾: {{$currentPath}}</a>
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

        <!-- bread -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('go') }}">Home</a></li>
                @foreach($breads as $bread)
                    <li class="breadcrumb-item"><a href="{{ route('go',['path'=>$bread['path']]) }}">{{ $bread['show'] }}</a></li>
                @endforeach
            </ol>
        </nav>
        <h3>
            Folders
        </h3>
        <ul class="list-group">
            @if(count($folders)==0)
                <li class="list-group-item danger">No Folder</li>
            @else
                @foreach($folders as $folder)
                    <li class="list-group-item"><a href="{{ route('go',['path'=>$folder['path']]) }}">{{$folder['show']}}</a></li>
                @endforeach
            @endif
        </ul>
        <h3 class="mt-5">
            Files
        </h3>
        <ul class="list-group">
            @if(count($files)==0)
                <li class="list-group-item danger">No File</li>
            @else
                @foreach($files as $file)
                    <li class="list-group-item">
                        <a href="{{ route('go',['path'=>$file['path']]) }}">
                            <h4>{{$file['show']}}</h4>
                            <h5>{{$file['info']['title']}}</h5>
                            <p>{{$file['info']['summary']}}</p>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
</body>
</html>