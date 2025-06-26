<div class="modal fade" id="addProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('page.manage.products.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">新增產品</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($companys))
                        <label for="addProduct_company_id" class="form-label">公司</label>
                        <select class="form-select form-select-lg mb-3" name="addProduct_company_id" id="addProduct_company_id">
                            @foreach ($companys as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    @elseif(isset($company))
                        <input type="hidden" value="{{ $company->id }}" name="addProduct_company_id">
                    @endif
                    @if(isset($user))
                        <input type="hidden" value="{{ $user->id }}" name="addProduct_user_id">
                    @endif
                    <div class="mb-3">
                        <label for="addProduct_image" class="form-label">產品照片</label>
                        <input type="file" class="form-control" id="addProduct_image" name="addProduct_image">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_name" class="form-label">產品名稱</label>
                        <input type="text" class="form-control" id="addProduct_name" name="addProduct_name">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_name_in_french" class="form-label">產品法語名稱</label>
                        <input type="text" class="form-control" id="addProduct_name_in_french" name="addProduct_name_in_french">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_description" class="form-label">描述</label>
                        <input type="text" class="form-control" id="addProduct_description" name="addProduct_description">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_description_in_french" class="form-label">法語描述</label>
                        <input type="text" class="form-control" id="addProduct_description_in_french" name="addProduct_description_in_french">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_brand" class="form-label">產品品牌名稱</label>
                        <input type="text" class="form-control" id="addProduct_brand" name="addProduct_brand">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_origin" class="form-label">產品原產國</label>
                        <input type="text" class="form-control" id="addProduct_origin" name="addProduct_origin">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_gross_weight" class="form-label">產品總重</label>
                        <input type="number" class="form-control" id="addProduct_gross_weight" name="addProduct_gross_weight">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_net_content_weight" class="form-label">產品淨重</label>
                        <input type="number" class="form-control" id="addProduct_net_content_weight" name="addProduct_net_content_weight">
                    </div>
                    <div class="mb-3">
                        <label for="addProduct_weight_unit" class="form-label">產品重量單位</label>
                        <input type="text" class="form-control" id="addProduct_weight_unit" name="addProduct_weight_unit">
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