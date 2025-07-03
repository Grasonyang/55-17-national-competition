
@extends('layout')
@section('main')
    <div class="container">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="register-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="register-name" name="name">
            </div>
            <div class="mb-3">
                <label for="register-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="register-email" name="email">
            </div>
            <div class="mb-3">
                <label for="register-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="register-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">cancel</a>
        </form>
    </div>
@endsection
@section('script')

@endsection
