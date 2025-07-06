@extends('layout')
@section('main')
    <div class="container">
        <h1>註冊</h1>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="login-name" name="name">
            </div>
            <div class="mb-3">
                <label for="login-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="login-email" name="email">
            </div>
            <div class="mb-3">
                <label for="login-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="login-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">cancel</a>
        </form>
    </div>
@endsection
@section('script')
@endsection