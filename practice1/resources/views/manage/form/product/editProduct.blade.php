<div class="modal fade" id="editProduct-{{ $product->gtin_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('page.manage.products.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">修改產品</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{ $company->id }}" name="editProduct_company_id">
                    @if(isset($user))
                        <input type="hidden" value="{{ $user->id }}" name="editProduct_user_id">
                    @endif
                    <div class="mb-3">
                        <label for="editProduct_image" class="form-label">產品照片</label>
                        <input type="file" class="form-control" id="editProduct_image" name="editProduct_image">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_name" class="form-label">產品名稱</label>
                        <input type="text" class="form-control" id="editProduct_name" name="editProduct_name">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_name_in_french" class="form-label">產品法語名稱</label>
                        <input type="text" class="form-control" id="editProduct_name_in_french" name="editProduct_name_in_french">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_description" class="form-label">描述</label>
                        <input type="text" class="form-control" id="editProduct_description" name="editProduct_description">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_description_in_french" class="form-label">法語描述</label>
                        <input type="text" class="form-control" id="editProduct_description_in_french" name="editProduct_description_in_french">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_brand" class="form-label">產品品牌名稱</label>
                        <input type="text" class="form-control" id="editProduct_brand" name="editProduct_brand">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_origin" class="form-label">產品原產國</label>
                        <input type="text" class="form-control" id="editProduct_origin" name="editProduct_origin">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_gross_weight" class="form-label">產品總重</label>
                        <input type="number" class="form-control" id="editProduct_gross_weight" name="editProduct_gross_weight">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_net_content_weight" class="form-label">產品淨重</label>
                        <input type="number" class="form-control" id="editProduct_net_content_weight" name="editProduct_net_content_weight">
                    </div>
                    <div class="mb-3">
                        <label for="editProduct_weight_unit" class="form-label">產品重量單位</label>
                        <input type="text" class="form-control" id="editProduct_weight_unit" name="editProduct_weight_unit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>