<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#stopCompany-{{ $company->id }}">{{ $title }}</button>
<div class="modal fade" id="stopCompany-{{ $company->id }}" tabindex="-1" aria-hidden="true">
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
                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                    <h3 class="text-danger">是否停用?</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $title }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>