<div class="modal fade" id="cancelStopCompany-{{$company->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('api.manage.companys.cancel.stop') }}" method="POST">
                @csrf
                @if(isset($user) && $user!==null)
                    <input type="hidden" value="user" name="user_type">
                @else
                    <input type="hidden" value="users" name="user_type">
                @endif
                <input type="hidden" value="{{ $company->id }}" class="form-control" id="" name="cancelStopCompany_company_id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">取消停用公司</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-danger">是否停用?</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-danger">是</button>
                </div>
            </form>
        </div>
    </div>
</div>