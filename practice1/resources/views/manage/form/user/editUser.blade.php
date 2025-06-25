<div class="modal fade" id="editUser-{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.users.edit', ['user_id'=>$user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5">修改使用者</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="editUser_user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="editUser_first_name-{{ $user->id }}" class="form-label">First Name</label>
                                <input type="text" value="{{ $user->first_name }}" class="form-control" id="editUser_first_name-{{ $user->id }}" name="editUser_first_name">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="last_name-{{ $user->id }}" class="form-label">Last Name</label>
                                <input type="text" value="{{ $user->last_name }}" class="form-control" id="editUser_last_name-{{ $user->id }}" name="editUser_last_name">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editUser_email-{{ $user->id }}" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="editUser_editUser_email-{{ $user->id }}" name="editUser_email">
                    </div>
                    <div class="mb-3">
                        <label for="editUser_pwd-{{ $user->id }}" class="form-label">Password</label>
                        <input type="password" class="form-control" id="editUser_pwd-{{ $user->id }}" name="editUser_password">
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