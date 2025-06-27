<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCompany-{{ $company->id }}">{{ $title }}</button>
<div class="modal fade" id="editCompany-{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ $action }}" method="post">
                @csrf
                @method($method)
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-name" class="form-label">公司名稱</label>
                        <input type="text" value="{{$company->name}}" class="form-control" id="editCompany-{{ $company->id }}-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-address" class="form-label">公司地址</label>
                        <input type="text" value="{{$company->address}}" class="form-control" id="editCompany-{{ $company->id }}-address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-phone" class="form-label">公司電話號碼</label>
                        <input type="text" value="{{$company->phone}}" class="form-control" id="editCompany-{{ $company->id }}-phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-email" class="form-label">公司電子郵件地址</label>
                        <input type="email" value="{{$company->email}}" class="form-control" id="editCompany-{{ $company->id }}-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-owner_name" class="form-label">擁有者姓名</label>
                        <input type="text" value="{{$company->owner_name}}" class="form-control" id="editCompany-{{ $company->id }}-owner_name" name="owner_name">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-owner_address" class="form-label">擁有者手機號碼</label>
                        <input type="text" value="{{$company->owner_address}}" class="form-control" id="editCompany-{{ $company->id }}-owner_address" name="owner_address">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-owner_email" class="form-label">擁有者電子郵件地址</label>
                        <input type="email" value="{{$company->owner_email}}" class="form-control" id="editCompany-{{ $company->id }}-owner_email" name="owner_email">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-contact_name" class="form-label">聯絡人姓名</label>
                        <input type="text" value="{{$company->contact_name}}" class="form-control" id="editCompany-{{ $company->id }}-contact_name" name="contact_name">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-contact_address" class="form-label">聯絡人手機號碼</label>
                        <input type="text" value="{{$company->contact_address}}" class="form-control" id="editCompany-{{ $company->id }}-contact_address" name="contact_address">
                    </div>
                    <div class="mb-3">
                        <label for="editCompany-{{ $company->id }}-contact_email" class="form-label">聯絡人電子郵件地址</label>
                        <input type="email" value="{{$company->contact_email}}" class="form-control" id="editCompany-{{ $company->id }}-contact_email" name="contact_email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $title }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>