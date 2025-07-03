@extends('layout')
@section('main')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>公司管理頁面</h2>
            
            <div>
                @include('form.company.addOrEdit',[
                    "title"=>"新增公司",
                    "type"=>"add",
                    "company"=>null,
                    "method"=>"POST",
                    "action"=>route('company.add')
                ])

                <a href="{{ route('company.show',['user_id'=>Auth::user()->id]) }}" class="btn btn-primary">返回</a>
            </div>
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
                            @if($company->status)
                                啟用
                            @else
                                停用
                            @endif
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
@section('script')

@endsection
