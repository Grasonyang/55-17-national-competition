<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">{{ $title }}</button>
<div class="modal fade" id="addProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addProduct-image" class="form-label">產品圖片</label>
                        <input type="file" class="form-control" id="addProduct-image" accept="image/png, image/jpg" name="image[]" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-name" class="form-label">產品名稱</label>
                        <input type="text" class="form-control" id="addProduct-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-name_in_french" class="form-label">產品法語名稱</label>
                        <input type="text" class="form-control" id="addProduct-name_in_french" name="name_in_french">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a description here" id="addProduct-description" name="description"></textarea>
                        <label for="addProduct-description">描述</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a description here" id="addProduct-description" name="description_in_french"></textarea>
                        <label for="addProduct-description_in_french">法語描述</label>
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-brand" class="form-label">產品品牌名稱</label>
                        <input type="text" class="form-control" id="addProduct-brand" name="brand">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-origin" class="form-label">產品原產國</label>
                        <input type="text" class="form-control" id="addProduct-origin" name="origin">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-gross_weight" class="form-label">產品總重</label>
                        <input type="number" class="form-control" id="addProduct-gross_weight" name="gross_weight">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-net_content_weight" class="form-label">產品淨重</label>
                        <input type="number" class="form-control" id="addProduct-net_content_weight" name="net_content_weight">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct-weight_unit" class="form-label">產品重量單位</label>
                        <input type="text" class="form-control" id="addProduct-weight_unit" name="weight_unit">
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