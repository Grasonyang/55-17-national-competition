<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showUser-{{$user->id}}">{{ $title }}</button>
<div class="modal fade" id="showUser-{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">使用者資訊</li>
                <li class="list-group-item">用者名稱: {{ $user->name }}</li>
                <li class="list-group-item">使用者電子郵件地址: {{ $user->email }}</li>
            </ul>
        </div>
    </div>
</div>