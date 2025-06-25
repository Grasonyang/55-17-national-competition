<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.users.add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">新增使用者</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="addUser_first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="addUser_first_name" name="addUser_first_name">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="addUser_last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="addUser_last_name" name="addUser_last_name">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="addUser_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="addUser_email" name="addUser_email">
                    </div>
                    <div class="mb-3">
                        <label for="addUser_pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="addUser_pwd" name="addUser_password">
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