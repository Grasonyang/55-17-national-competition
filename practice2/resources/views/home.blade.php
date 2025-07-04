<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
</head>
<body>
    <div class="container mt-2 p-5">
        <h1>資料夾</h1>
        <h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach($key as $k)
                        <li class="breadcrumb-item">
                            <a href="{{ route('index', ['path'=>$k['path']]) }}">{{ $k['name'] }}</a>
                        </li>
                    @endforeach
                </ol>
                
            </nav>
        </h3>
        <ul>
            @foreach($folders as $folder)
                <li>
                    <a href="{{ route('index', ['path'=>$folder]) }}">{{ $folder }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container mt-2 p-5">
        <h2>檔案</h2>
        @foreach($files as $file)
            <li>
                <a href="{{ route('index', ['path'=>$file]) }}">{{ $file }}</a>
            </li>
        @endforeach
    </div>
    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
</body>
</html>