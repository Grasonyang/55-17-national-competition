@extends("layout")
@section("content")
    <form action="{{ route('api.signup') }}" method="POST">
        <div class="mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="col-12 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="sign_up_email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="sign_up_email" name="email">
        </div>
        <div class="mb-3">
            <label for="sign_up_pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="sign_up_pwd" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection