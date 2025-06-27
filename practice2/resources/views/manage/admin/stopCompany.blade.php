@extends("layout")
@section("main")
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>管理公司</h1>
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.manage.company') }}" class="btn btn-primary">返回</a>
                </li>
            </ul>
        </div>
        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>公司名稱</td>
                        <td>公司狀態</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companys as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            @if($company->status)
                                <td class="text-success">啟用</td>
                            @else
                                <td class="text-danger">停用</td>
                            @endif
                            <td>
                                @include("manage.admin.form.showCompany", [
                                    "title"=>"查看公司詳細資訊",
                                    "company"=>$company,
                                ])
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection