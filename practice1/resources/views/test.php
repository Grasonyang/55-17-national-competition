@extends("layout")
@section("content")
test
    @if(session('message'))
        <div class="text-primary">{{ session('message') }}</div>
    @endif
@endsection