<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$method}}-{{ $company->id ?? '' }}">
  {{$title}}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$method}}-{{ $company->id ?? '' }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ $action }}" method="post">
        @csrf
        @method($method)
        <div class="modal-header">
            <h1 class="modal-title fs-5">{{$title}}確認</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            是否{{ $title }}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">{{$title}}</button>
        </div>
      </form>
    </div>
  </div>
</div>