<div class="modal fade" id="deleteUser-{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.users.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5">刪除使用者</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="deleteUser_user_id" value="{{ $user->id }}">
                    <h3 class="text-danger">是否要刪除?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-danger">是</button>
                </div>
            </form>
        </div>
    </div>
</div>