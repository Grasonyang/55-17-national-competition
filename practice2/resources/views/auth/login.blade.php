@extends("layout")
@section("main")
    <div class="container mt-5">
        <form action="{{ route('api.login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="login-email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="login-email" name="email">
            </div>
            <div class="mb-3">
                <label for="login-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="login-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-secondary" onclick="{{ route('home') }}">Cancel</button>
        </form>
    </div>
@endsection