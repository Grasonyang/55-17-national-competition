<div class="modal fade" id="showCompanyDetail-{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">公司</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card">
                <div class="card-body">
                    <h5 class="card-title">{{ $company->company_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Owner: {{ $company->user->name }}</h6>
                    <ul>
                        <li>公司地址:{{ $company->company_address }}</li>
                        <li>公司電話號碼:{{ $company->company_phone }}</li>
                        <li>公司電子郵件地址:{{ $company->company_email }}</li>
                    </ul>
                    <h5 class="card-title">擁有者資訊:</h5>
                    <ul>
                        <li>擁有者姓名:{{ $company->owner_name }}</li>
                        <li>擁有者手機號碼:{{ $company->owner_phone }}</li>
                        <li>擁有者電子郵件地址 :{{ $company->owner_email }}</li>
                    </ul>
                    <h5 class="card-title">聯絡人資訊:</h5>
                    <ul>
                        <li>聯絡人姓名:{{ $company->contact_name }}</li>
                        <li>聯絡人手機號碼:{{ $company->contact_phone }}</li>
                        <li>聯絡人電子郵件地址 :{{ $company->contact_email }}</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>