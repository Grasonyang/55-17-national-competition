@extends("layout")
@section("content")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="fw-bold text-center">停用公司管理頁面</h2>
            <ul class="nav">
                <li class="nav-item">
                    @if($addType=='user')
                        <a href="{{ route('page.manage.companys.user', ['user_id'=>$user_id]) }}" class="btn btn-secondary">返回</a>
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
                        <th>權限管理者</th>
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
                            <td>{{ $company->user->name }}</td>
                            <td style="min-width: 150px;">{{ $company->company_name }}</td>
                            <td class="text-danger">已刪除</td>
                            <td style="min-width: 200px;">{{ $company->created_at }}</td>
                            <td style="min-width: 450px;">
                                @if($addType=='admin')
                                    <button
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showCompanyAdmin-{{ $company->id }}"
                                    >
                                        查看公司管理者
                                    </button>
                                    @include("manage.form.showCompanyAdmin",['user'=>$company->user, 'company'=>$company])
                                @endif
                                
                                <button
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#showCompanyDetail-{{ $company->id }}"
                                >
                                    查看公司詳細資料
                                </button>
                                @include("manage.form.showCompanyDetail",['user'=>$company->user, 'company'=>$company])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection