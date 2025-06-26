<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <style>
        p.drop-cap::first-letter {
            float: left;
            font-size: 3.5rem;
            line-height: 1;
            margin-right: 0.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <h1>{{ $title }}</h1>
        <div class="container mt-5">
            <h3>File</h3>
            <ul class="list-group">
                @foreach($pages as $file)
                    <!-- <pre>{{ print_r($file,true); }}</pre> -->
                    <a href="{{ route('handle', ['path'=> $file['path']]) }}">
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
    </div>
    <script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
</body>
</html>
