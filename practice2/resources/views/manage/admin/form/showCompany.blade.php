<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showCompany-{{ $company->id }}">{{ $title }}</button>
<div class="modal fade" id="showCompany-{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">公司資訊</li>
                <li class="list-group-item">公司名稱: {{ $company->name }}</li>
                <li class="list-group-item">公司地址: {{ $company->address }}</li>
                <li class="list-group-item">公司電話號碼: {{ $company->phone }}</li>
                <li class="list-group-item">公司電子郵件地址: {{ $company->email }}</li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">擁有者資訊</li>
                <li class="list-group-item">擁有者姓名:{{ $company->owner_name }}</li>
                <li class="list-group-item"> 擁有者手機號碼 :{{ $company->owner_address }}</li>
                <li class="list-group-item">擁有者電子郵件地址 :{{ $company->owner_email }}</li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">An active item</li>
                <li class="list-group-item">聯絡人姓名:{{$company->contact_name}}</li>
                <li class="list-group-item"> 聯絡人手機號碼 :{{$company->contact_address}}</li>
                <li class="list-group-item">聯絡人電子郵件地址:{{$company->contact_email}}</li>
            </ul>
        </div>
    </div>
</div>