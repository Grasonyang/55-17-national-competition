<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompany-{{$company->id ?? null}}">
  {{ $title }}
</button>

<!-- Modal -->
<div class="modal fade" id="addCompany-{{$company->id ?? null}}" tabindex="-1" aria-hidden="true">
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
                <label for="#addCompany-{{$company->id ?? null}}-user_id" class="form-label">選擇User</label>
                <select class="form-select" aria-label="" name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-name" class="form-label">公司名稱</label>
                <input type="text" value="{{ $company->name ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-name' name='name'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-address" class="form-label">公司地址</label>
                <input type="text" value="{{ $company->address ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-address' name='address'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-phone" class="form-label">公司電話號碼</label>
                <input type="text" value="{{ $company->phone ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-phone' name='phone'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-email" class="form-label">公司電子郵件地址</label>
                <input type="email" value="{{ $company->email ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-email' name='email'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-contact_name" class="form-label">聯絡人姓名</label>
                <input type="text" value="{{ $company->contact_name ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-contact_name' name='contact_name'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-contact_number" class="form-label">聯絡人手機號碼</label>
                <input type="text" value="{{ $company->contact_number ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-contact_number' name='contact_number'>
            </div>
            <div class="mb-3">
                <label for="#addCompany-{{$company->id ?? null}}-contact_address" class="form-label">聯絡人電子郵件地址</label>
                <input type="text" value="{{ $company->contact_address ?? '' }}" class="form-control" id='#addCompany-{{$company->id ?? null}}-contact_address' name='contact_address'>
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