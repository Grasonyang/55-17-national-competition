<div class="modal fade" id="editCompany-{{$company->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.companys.edit') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >修改公司資訊</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($user) && $user!==null)
                        <input type="hidden" value="user" name="user_type">
                    @else
                        <input type="hidden" value="users" name="user_type">
                    @endif
                    <input type="hidden" value="{{ $company->id }}" class="form-control" id="" name="editCompany_company_id">
                    <div class="mb-3">
                        <label for="editCompany_company_name" class="form-label">公司名稱</label>
                        <input type="text" value="{{ $company->company_name }}" class="form-control" id="editCompany_company_name" name="editCompany_company_name">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_address" class="form-label">公司地址</label>
                        <input type="text" value="{{ $company->company_address }}" class="form-control" id="editCompany_company_address" name="editCompany_company_address">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_phone" class="form-label">公司電話號碼</label>
                        <input type="text" value="{{ $company->company_phone }}" class="form-control" id="editCompany_company_phone" name="editCompany_company_phone">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_email" class="form-label">公司電子郵件地址</label>
                        <input type="email" value="{{ $company->company_email }}" class="form-control" id="editCompany_company_email" name="editCompany_company_email">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_owner_name" class="form-label">擁有者姓名</label>
                        <input type="text" value="{{ $company->owner_name }}" class="form-control" id="editCompany_company_owner_name" name="editCompany_company_owner_name">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_owner_phone" class="form-label">擁有者手機號碼</label>
                        <input type="text" value="{{ $company->owner_phone }}" class="form-control" id="editCompany_company_owner_phone" name="editCompany_company_owner_phone">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_owner_email" class="form-label">擁有者電子郵件地址</label>
                        <input type="email" value="{{ $company->owner_email }}" class="form-control" id="editCompany_company_owner_email" name="editCompany_company_owner_email">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_contact_owner" class="form-label">聯絡人姓名</label>
                        <input type="text" value="{{ $company->contact_name }}" class="form-control" id="editCompany_company_contact_owner" name="editCompany_company_contact_owner">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_contact_phone" class="form-label">聯絡人手機號碼</label>
                        <input type="text" value="{{ $company->contact_phone }}" class="form-control" id="editCompany_company_contact_phone" name="editCompany_company_contact_phone">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany_company_contact_email" class="form-label">聯絡人電子郵件地址</label>
                        <input type="email" value="{{ $company->contact_email }}" class="form-control" id="editCompany_company_contact_email" name="editCompany_company_contact_email">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>