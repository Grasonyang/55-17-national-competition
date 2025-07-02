<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/bootstrap.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        @if(Auth::check())
            @if(Auth::user()->role=="admin")
                @include('navbar.style3')
            @else
                @include('navbar.style2')
            @endif
        @else
            @include('navbar.style1')
        @endif
    </header>
    <main>
        @yield('main_content')
    </main>
    <footer></footer>
    <script src="{{ asset('asset/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('asset/jquery.min.js') }}"></script>
</body>
</html>