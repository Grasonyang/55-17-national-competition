<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">{{ $title }}</button>
<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
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
                        <label for="addUser-name" class="form-label">使用者姓名</label>
                        <input type="text" class="form-control" id="addUser-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="addUser-email" class="form-label">使用者信箱</label>
                        <input type="text" class="form-control" id="addUser-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="addUser-password" class="form-label">使用者密碼</label>
                        <input type="text" class="form-control" id="addUser-password" name="password">
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