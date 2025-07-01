@extends('layout')
@section('main_content')
    <div class="container">
        <form action="{{ route('post.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login-email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="login-email" name="email">
            </div>
            <div class="mb-3">
                <label for="login-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="login-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            
        </form>
    </div>
@endsection