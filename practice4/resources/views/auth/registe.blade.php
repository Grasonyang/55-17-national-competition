
@extends('layout')
@section('main_content')
    <div class="container">
        <form acton="{{ route('registe') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="login-name" name="name">
            </div>
            <div class="mb-3">
                <label for="login-email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="login-email" name="email">
            </div>
            <div class="mb-3">
                <label for="login-Password" class="form-label">Password</label>
                <input type="Password" class="form-control" id="login-Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
