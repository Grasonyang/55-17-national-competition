@extends('layout')
@section('main_content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>公司資訊</h2>
            @include('form.company.addOrEdit',[
                'title'=>"新增公司資訊",   
                'action'=> route('company.add'),
                'method'=>'POST',
                'company'=>null
            ])
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">公司名稱</th>
                    <th scope="col">公司狀態</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>
                        <td>
                            @if($company->status == 1)
                                <span class="badge bg-success">啟用</span>
                            @else
                                <span class="badge bg-danger">停用</span>
                            @endif
                        </td>
                        <td>
                            @include('form.company.addOrEdit',[
                                'title'=>"修改公司資訊",
                                'action'=> route('company.edit',['company_id'=>$company->id]),
                                'method'=>'put',
                                'company'=>$company
                            ])
                            @include('form.company.stopOrDelete',[
                                'title'=>"停用",
                                'action'=> route('company.stop',['company_id'=>$company->id]),
                                'method'=>'put',
                                'company'=>$company
                            ])
                            @include('form.company.stopOrDelete',[
                                'title'=>"刪除",
                                'action'=> route('company.delete',['company_id'=>$company->id]),
                                'method'=>'delete',
                                'company'=>$company
                            ])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
