<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  手動輸入
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('gtin') }}" method="get">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">手動輸入GTIN</h1>
                    <button type="button" class="btn btn-primary" onclick="addGtinInput()">新增輸入欄位</button>
                </div>
                <div class="modal-body">
                    <div class="block d-flex">
                        <input type="text" name="gtin[]" class="form-control">
                        <button type="button" class="btn btn-danger" onclick="$(this).parent().remove()">刪除</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('assets/jquery.min.js') }}"></script>
<script>
    function addGtinInput() {
        $(".modal-body").append(`
            <div class="block d-flex mt-2">
                <input type="text" name="gtin[]" class="form-control">
                <button type="button" class="btn btn-danger" onclick="$(this).parent().remove()">刪除</button>
            </div>
        `);
    }
</script>