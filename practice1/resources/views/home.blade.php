@extends("layout")
@section("content")
    <h1>Hello</h1>
    @auth
    <p>歡迎，{{ auth()->user()->name }}</p>
    @endauth

@endsection