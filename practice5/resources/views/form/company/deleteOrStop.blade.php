<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $type }}-{{ $company->id ?? '' }}">
  {{ $title }}公司
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $type }}-{{ $company->id ?? '' }}" tabindex="-1" aria-hidden="true">
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
                    是否{{$title}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">是</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">否</button>
                </div>
            </form>
        </div>
    </div>
</div>