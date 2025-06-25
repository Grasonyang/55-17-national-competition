@extends("layout")
@section("content")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="fw-bold text-center">公司管理頁面</h2>
            <ul class="nav">
                <li class="nav-item">
                    @if(isset($user) && $user!==null)
                        <a href="{{ route('page.manage.companys',['user_id'=>$user->id]) }}" class="btn btn-secondary">返回</a>
                    @else
                        <a href="{{ route('page.manage.companys') }}" class="btn btn-secondary">返回</a>
                    @endif
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
                        <th>公司名稱</th>
                        <th>公司狀態</th>
                        <th>建立時間</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companys as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td style="min-width: 150px;">{{ $company->company_name }}</td>
                            @if($company->is_active)
                                <td class="text-success">啟用中</td>
                            @else
                                <td class="text-danger">停用中</td>
                            @endif
                            <td style="min-width: 200px;">{{ $company->created_at }}</td>
                            <td style="min-width: 450px;">
                                <button
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#cancelStopCompany-{{ $company->id }}"
                                >
                                    取消停用
                                </button>
                                @if(isset($user) && $user!==null)
                                    @include("manage.form.company.cancelStopCompany", ["company"=>$company, "user"=>$user])
                                @elseif(isset($users) && $users!==null)
                                    @include("manage.form.company.cancelStopCompany", ["company"=>$company])
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection