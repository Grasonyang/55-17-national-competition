<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser-{{ $user->id }}">{{ $title }}</button>
<div class="modal fade" id="editUser-{{ $user->id }}" tabindex="-1" aria-hidden="true">
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
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="editUser-name-{{$user->id}}" class="form-label">使用者姓名</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" id="editUser-name-{{$user->id}}" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editUser-email-{{$user->id}}" class="form-label">使用者信箱</label>
                        <input type="text" value="{{ $user->email }}" class="form-control" id="editUser-email-{{$user->id}}" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="editUser-password-{{$user->id}}" class="form-label">使用者密碼</label>
                        <input type="text" value="" placeholder="輸入修改" class="form-control" id="editUser-password-{{$user->id}}" name="password">
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