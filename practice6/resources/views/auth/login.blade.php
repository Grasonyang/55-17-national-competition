@extends('layout')
@section('main')
    <div class="container">
        <h1>登入</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
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