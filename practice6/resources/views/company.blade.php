@extends('layout')
@section('main')
    <div class="container p-5">
        <!-- <h1>公司管理</h1> -->
        <div class="d-flex align-items-center justify-content-between">
            <h1>公司管理</h1>
            <!-- add company -->
            <div>
                @if($isStop)
                    <a href="{{ route('company') }}" class="btn btn-primary">返回</a>
                @else
                    @include('form.company.addOrEdit',[
                        "title"=>"新增公司",
                        "action"=>route('company.store'),
                        "method"=>"POST",
                        "company"=>null,
                        "users"=>$users,
                    ])
                    <a href="{{ route('company',['stop'=>true]) }}" class="btn btn-primary">查看停用公司</a>
                @endif
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">公司ID</th>
                    <th scope="col">公司名稱</th>
                    <th scope="col">公司狀態</th>
                    <th scope="col">管理操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <th>{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>
                        <td>
                            @if($company->status)
                                <p class="text-success">啟用中</p>
                            @else
                                <p class="text-danger">停用中</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product',['company_id'=>$company->id]) }}" class="btn btn-primary">查看公司產品</a>
                            @include('form.company.addOrEdit',[
                                "title"=>"修改公司",
                                "action"=>route('company.update',['company_id'=>$company->id]),
                                "method"=>"put",
                                "company"=>$company,
                                "users"=>$users,
                            ])
                            @include('form.company.stopOrDelete',[
                                "title"=>"停用",
                                "action"=>route('company.stop',['company_id'=>$company->id]),
                                "method"=>"patch",
                            ])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
@endsection