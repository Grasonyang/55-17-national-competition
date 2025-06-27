@extends("layout")
@section("main")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>管理使用者</h1>
            <ul class="nav">
                <li>
                    @include("manage.admin.form.addUser", [
                        "title"=>"新增使用者",  
                        "action"=>route("api.admin.manage.user.add"),
                        "method"=>"POST",
                    ])
                </li>
            </ul>
        </div>
        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>使用者名稱</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @include("manage.admin.form.showUser", [
                                    "title"=>"查看使用者詳細資訊",
                                    "user"=>$user,
                                ])
                                @include("manage.admin.form.editUser", [
                                    "title"=>"修改使用者",  
                                    "action"=>route("api.admin.manage.user.edit"),
                                    "method"=>"PUT",
                                    "user"=>$user,
                                ])
                                @include("manage.admin.form.deleteUser", [
                                    "title"=>"刪除使用者",  
                                    "action"=>route("api.admin.manage.user.delete"),
                                    "method"=>"DELETE",
                                    "user"=>$user,
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection