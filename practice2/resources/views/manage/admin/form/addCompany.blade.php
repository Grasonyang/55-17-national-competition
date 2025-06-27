<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompany">{{ $title }}</button>
<div class="modal fade" id="addCompany" tabindex="-1" aria-hidden="true">
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
                    <div class="mb-3">
                        <label for="addCompany-name" class="form-label">公司名稱</label>
                        <input type="text" class="form-control" id="addCompany-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-address" class="form-label">公司地址</label>
                        <input type="text" class="form-control" id="addCompany-address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-phone" class="form-label">公司電話號碼</label>
                        <input type="text" class="form-control" id="addCompany-phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-email" class="form-label">公司電子郵件地址</label>
                        <input type="email" class="form-control" id="addCompany-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-owner_name" class="form-label">擁有者姓名</label>
                        <input type="text" class="form-control" id="addCompany-owner_name" name="owner_name">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-owner_address" class="form-label">擁有者手機號碼</label>
                        <input type="text" class="form-control" id="addCompany-owner_address" name="owner_address">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-owner_email" class="form-label">擁有者電子郵件地址</label>
                        <input type="email" class="form-control" id="addCompany-owner_email" name="owner_email">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-contact_name" class="form-label">聯絡人姓名</label>
                        <input type="text" class="form-control" id="addCompany-contact_name" name="contact_name">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-contact_address" class="form-label">聯絡人手機號碼</label>
                        <input type="text" class="form-control" id="addCompany-contact_address" name="contact_address">
                    </div>
                    <div class="mb-3">
                        <label for="addCompany-contact_email" class="form-label">聯絡人電子郵件地址</label>
                        <input type="email" class="form-control" id="addCompany-contact_email" name="contact_email">
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