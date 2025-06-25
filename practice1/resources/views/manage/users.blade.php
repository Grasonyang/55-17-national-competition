@extends("layout")
@section("content")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="fw-bold text-center">使用者管理頁面</h2>
            <ul class="nav">
                <li class="nav-item">
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#addUser">
                        新增用戶
                    </button>
                    @include("manage.form.user.addUser")
                </li>
                <li class="nav-item">
                    <a href="{{ route('page.manage') }}" class="btn btn-secondary">返回</a>
                </li>
            </ul>
        </div>
        @if(session('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>Email</th>
                        <th>角色</th>
                        <th>建立時間</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td style="min-width: 150px;">{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td style="min-width: 200px;">{{ $user->created_at }}</td>
                            <td style="min-width: 300px;">
                                <button
                                    type="button"
                                    class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUser-{{ $user->id }}">
                                    修改用戶
                                </button>
                                @include("manage.form.user.editUser", ['user' => $user])
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteUser-{{ $user->id }}">
                                    刪除用戶
                                </button>
                                @include("manage.form.user.deleteUser", ['user' => $user])
                                <a href="{{ route('page.manage.companys',['user_id' => $user->id]) }}" class="btn btn-primary">管理該用戶的公司</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection