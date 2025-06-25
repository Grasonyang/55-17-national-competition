<div class="modal fade" id="AddCompany" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.companys.add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">新增公司</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="AddCompany_user_id" class="form-label">權限管理者</label>
                        @if(isset($user) && $user!==null)
                            <input type="hidden" value="user" name="user_type">
                            <input type="hidden" value="{{ $user->id }}" name="AddCompany_user_id">
                            <input type="text" value="{{ $user->name }}" class="form-control" disabled>
                        @elseif(isset($users) && $users!==null)
                            <input type="hidden" value="users" name="user_type">
                            <select class="form-select form-select-sm" id="AddCompany_user_id" name="AddCompany_user_id" aria-label="Small select example">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_name" class="form-label">公司名稱</label>
                        <input type="text" class="form-control" id="AddCompany_company_name" name="AddCompany_company_name">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_address" class="form-label">公司地址</label>
                        <input type="text" class="form-control" id="AddCompany_company_address" name="AddCompany_company_address">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_phone" class="form-label">公司電話號碼</label>
                        <input type="text" class="form-control" id="AddCompany_company_phone" name="AddCompany_company_phone">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_email" class="form-label">公司電子郵件地址</label>
                        <input type="email" class="form-control" id="AddCompany_company_email" name="AddCompany_company_email">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_owner_name" class="form-label">擁有者姓名</label>
                        <input type="text" class="form-control" id="AddCompany_company_owner_name" name="AddCompany_company_owner_name">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_owner_phone" class="form-label">擁有者手機號碼</label>
                        <input type="text" class="form-control" id="AddCompany_company_owner_phone" name="AddCompany_company_owner_phone">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_owner_email" class="form-label">擁有者電子郵件地址</label>
                        <input type="email" class="form-control" id="AddCompany_company_owner_email" name="AddCompany_company_owner_email">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_contact_owner" class="form-label">聯絡人姓名</label>
                        <input type="text" class="form-control" id="AddCompany_company_contact_owner" name="AddCompany_company_contact_owner">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_contact_phone" class="form-label">聯絡人手機號碼</label>
                        <input type="text" class="form-control" id="AddCompany_company_contact_phone" name="AddCompany_company_contact_phone">
                    </div>
                    <div class="mb-3">
                        <label for="AddCompany_company_contact_email" class="form-label">聯絡人電子郵件地址</label>
                        <input type="email" class="form-control" id="AddCompany_company_contact_email" name="AddCompany_company_contact_email">
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