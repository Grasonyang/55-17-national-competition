<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <title>Document</title>
</head>
<body style="width:100vw">
    <header>
        @if(Auth::check())
            @if(Auth::user()->role=="admin")
                @include('navbar.style2')
            @elseif(Auth::user()->role=="user")
                @include('navbar.style3')
            @else
                @include('navbar.style1')
            @endif
        @else
            @include('navbar.style1')
        @endif
    </header>
    <main>
        <div class="container">
            @if(session("message"))
                <div class="alert alert-info">
                    {{ session("message") }}
                </div>
            @endif
            @if(session("error"))
                <div class="alert alert-danger">
                    {{ session("error") }}
                </div>
            @endif
            @if(session("errors"))
                <div class="alert alert-danger">
                    <ul>
                        @foreach(session("errors")->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session("success"))
                <div class="alert alert-success">
                    {{ session("success") }}
                </div>
            @endif
        </div>
        @yield('main')
    </main>
    <footer></footer>
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap.bundle.js') }}"></script>
</body>
</html>