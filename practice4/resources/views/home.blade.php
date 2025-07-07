<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container p-5 m-5">
        <h1>{{ $currentFolderName }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('go') }}">Home</a>
                </li>
                @foreach($path as $item)
                    <li class="breadcrumb-item">
                        <a href="{{ route('go', ['path'=>$item['path']]) }}">{{ $item['show'] }}</a>
                    </li>
                @endforeach
            </ol>
        </nav>
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Folders</h3>
            </li>
            @if($folders->isEmpty())
                <li class="list-group-item text-danger">No Next Folder</li>
            @else
                @foreach($folders as $folder)
                    <li class="list-group-item">
                        <a href="{{ route('go',['path'=>$currentPath.'/'.ltrim($folder,'/')]) }}">{{ $folder }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
        <ul class="list-group mt-5">
            <li class="list-group-item">
                <h3>Files</h3>
            </li>
            @if($files->isEmpty())
                <li class="list-group-item text-danger">No File</li>
            @else
                @foreach($files as $file)
                    <li class="list-group-item">
                        <a href="{{ route('go',['path'=>$currentPath.'/'.ltrim($file['name'],'/')]) }}">{{ $file['title'] }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <script src="{{ asset('assets/jquery.min.css') }}"></script>
</body>
</html>