<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <header>
        @if(Auth::check())
            @if(Auth::user()->role=="admin")
                @include('navbar.navbar2')
            @elseif(Auth::user()->role=="user")
                @include('navbar.navbar3')
            @endif
        @else
            @include('navbar.navbar1')
        @endif
    </header>
    <main>
        @yield('content')
    </main>
    <footer></footer>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>
</html>