@extends("layout")
@section("main")
    <div class="container mt-5">
        <form action="{{ route('api.registe') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="registe-name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="registe-name" name="name">
            </div>
            <div class="mb-3">
                <label for="registe-email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="registe-email" name="email">
            </div>
            <div class="mb-3">
                <label for="registe-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="registe-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button type="button" class="btn btn-secondary" onclick="{{ route('home') }}">Cancel</button>
        </form>
    </div>
@endsection