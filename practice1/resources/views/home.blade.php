<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container p-3">
        <h1>{{ $currentFolder }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach($everyFolderPath as $path)
                    <li class="breadcrumb-item">
                        <a href="{{ route('handle', ['path'=> $path['fullPath']]) }}">{{ $path['path'] }}</a>
                    </li>
                @endforeach
                
            </ol>
        </nav>
        <div class="container">
            <h3>Folder</h3>
            @if($isEmpty)
                <h5 class="text text-danger">The Folder is Empty!!!</h5>
            @else
                <div class="container mt-5">
                    <ul class="list-group">
                        @foreach($folders as $folder)
                            <li class="list-group-item">
                                <a href="{{ route('handle', ['path'=> $currentFolder.'/'.$folder]) }}">{{ $folder }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="container mt-5">
                    <h3>File</h3>
                    <ul class="list-group">
                        @foreach($files as $file)
                            <!-- <pre>{{ print_r($file,true); }}</pre> -->
                            <a href="{{ route('handle', ['path'=> $file['path'].'/'.$file['name']]) }}">
                                <li class="list-group-item">
                                    <div>
                                        <h3>{{ $file['name'] }}</h3>
                                        <h5>Title: {{ $file['title'] }}</h5>
                                        <h6>Summary: {{ $file['summary'] }}</h6>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
</body>
</html>