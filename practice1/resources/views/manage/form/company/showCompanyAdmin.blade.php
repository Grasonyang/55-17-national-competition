<div class="modal fade" id="showCompanyAdmin-{{ $company->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">權限管理者</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card">
                <div class="card-body">
                    <h5 class="card-title">{{ $company->user->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Owner: {{ $company->user->name }}</h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>