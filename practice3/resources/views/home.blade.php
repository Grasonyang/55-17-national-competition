<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
</head>
<body>
    <div class="container p-5">
        <section>
            <h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" >
                            <a href="{{ route('go') }}">Home</a>
                        </li>
                        @foreach($breads as $bread)
                            <li class="breadcrumb-item" >
                                <a href="{{ route('go', ['path'=>$bread['path']]) }}">{{ $bread['show'] }}</a>
                            </li>
                        @endforeach
                        
                    </ol>
                </nav>
            </h3>
        </section>
        <secton>
            <h1>All Folders</h1>
            @if(count($folders)==0)
                <h3 class="text-danger">No Folder</h3>
            @else
                <ul class="list-group">
                    @foreach($folders as $folder)
                        <li class="list-group-item">
                            <a href="{{ route('go', ['path'=>$basePath.$folder]) }}">{{ $folder }}</a>
                        </li>
                    @endforeach
                </ul>

            @endif
        </secton>
        <secton>
            <h1>All Files</h1>
            @if(count($files)==0)
                <h3 class="text-danger">No File</h3>
            @else
                <ul class="list-group">
                    @foreach($files as $file)
                        <li class="list-group-item">
                            <a href="{{ route('go', ['path'=>$basePath.$file]) }}">{{ $file }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </secton>
    </div>
    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
</body>
</html>