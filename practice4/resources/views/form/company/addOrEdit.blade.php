<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrEdit-{{ $company->id ?? '' }}">
  {{$title}}
</button>

<!-- Modal -->
<div class="modal fade" id="addOrEdit-{{ $company->id ?? '' }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ $action }}" method="post">
        @csrf
        @method($method)
        <div class="modal-header">
            <h1 class="modal-title fs-5">{{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">公司名稱</label>
                <input type="text" value="{{$company->name ?? ''}}" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">公司地址</label>
                <input type="text" value="{{$company->address ?? ''}}" class="form-control" name="address">
            </div>
            <div class="mb-3">
                <label class="form-label">公司電話號碼</label>
                <input type="text" value="{{$company->phone ?? ''}}" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label class="form-label">公司電子郵件地址</label>
                <input type="email" value="{{$company->email ?? ''}}" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">聯絡人姓名 </label>
                <input type="text" value="{{$company->contact_name ?? ''}}" class="form-control" name="contact_name">
            </div>
            <div class="mb-3">
                <label class="form-label">聯絡人電話號碼 </label>
                <input type="text" value="{{$company->contact_phone ?? ''}}" class="form-control" name="contact_phone">
            </div>
            <div class="mb-3">
                <label class="form-label">聯絡人電子郵件地址 </label>
                <input type="email" value="{{$company->contact_email ?? ''}}" class="form-control" name="contact_email">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>