@extends("layout")
@section("content")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2 class="fw-bold text-center">公司管理頁面</h2>
            <ul class="nav">
                <li class="nav-item">
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#AddCompany">
                        新增公司
                    </button>
                    @if(isset($user) && $user!==null)
                        @include("manage.form.company.addCompany", ["user"=>$user])
                    @else
                        @include("manage.form.company.addCompany", ["users"=>$users])
                    @endif
                    
                </li>
                <li class="nav-item">
                    @if(isset($user) && $user!==null)
                        <a href="{{ route('page.manage.stop.companys', ['user_id'=>$user->id]) }}" class="btn btn-secondary">查看停用公司</a>
                    @else
                        <a href="{{ route('page.manage.stop.companys') }}" class="btn btn-secondary">查看停用公司</a>
                    @endif
                    
                </li>
                <li class="nav-item">
                    @if(isset($user) && $user!==null)
                        <a href="{{ route('page.manage.delete.companys', ['user_id'=>$user->id]) }}" class="btn btn-secondary">查看刪除公司</a>
                    @else
                        <a href="{{ route('page.manage.delete.companys') }}" class="btn btn-secondary">查看刪除公司</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(isset($user) && $user!==null)
                        <a href="{{ route('page.manage',['user_id'=>$user->id]) }}" class="btn btn-secondary">返回</a>
                    @else
                        <a href="{{ route('page.manage') }}" class="btn btn-secondary">返回</a>
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
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#showCompanyAdmin-{{ $company->id }}"
                                >
                                    查看公司管理者
                                </button>
                                @include("manage.form.company.showCompanyAdmin", ["company"=>$company])
                                <button
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#showCompanyDetail-{{ $company->id }}"
                                >
                                    查看公司詳細資料
                                </button>
                                @include("manage.form.company.showCompanyDetail", ["company"=>$company])
                                <button
                                    class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editCompany-{{ $company->id }}"
                                >
                                    修改
                                </button>
                                @if(isset($user) && $user!==null)
                                    @include("manage.form.company.editCompany", ["company"=>$company, "user"=>$user])
                                @elseif(isset($users) && $users!==null)
                                    @include("manage.form.company.editCompany", ["company"=>$company])
                                @endif
                                
                                <button
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#stopCompany-{{ $company->id }}"
                                >
                                    停用
                                </button>
                                @if(isset($user) && $user!==null)
                                    @include("manage.form.company.stopCompany", ["company"=>$company, "user"=>$user])
                                @elseif(isset($users) && $users!==null)
                                    @include("manage.form.company.stopCompany", ["company"=>$company])
                                @endif
                                <button
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteCompany-{{ $company->id }}"
                                >
                                    刪除
                                </button>
                                @if(isset($user) && $user!==null)
                                    @include("manage.form.company.deleteCompany", ["company"=>$company, "user"=>$user])
                                @elseif(isset($users) && $users!==null)
                                    @include("manage.form.company.deleteCompany", ["company"=>$company])
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection