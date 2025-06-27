<div class="container">
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($method)
        <div class="modal-header d-flex justify-content-between">
            <h1 class="modal-title fs-5 ">{{ $title }}</h1>
            <div>
                @include("manage.admin.form.stopProduct", [
                    "title"=>"停用產品",  
                    "action"=>route("api.admin.manage.product.stop"),
                    "method"=>"PUT",
                    "product"=>$product,
                ])
                @if(!$product->company)
                    @include("manage.admin.form.selectCompany", [
                        "title"=>"選擇公司",  
                        "action"=>route("api.admin.manage.product.add.company"),
                        "method"=>"PUT",
                        "product"=>$product,
                        "companys"=>$companys,
                    ])
                @endif
                
            </div>
        </div>
        <div class="modal-body">
            <input type="hidden" name="product_id" value="{{ $product->gtin }}">
            <div class="mb-3">
                <label for="addProduct-image" class="form-label">產品圖片</label>
                <input type="file" class="form-control" id="addProduct-image" accept="image/png, image/jpg" name="image[]" multiple >
            </div>
            <div class="container">
                <div class="row">
                    @foreach($product->product_images as $image)
                        <div class="col-3">
                            <img src="{{ asset('storage/'.$image->image_url) }}" style="width:100px" class="img-fluid" alt="Product Image">
                            <input type="hidden" name="image_url[]" value="{{ $image->image_url }}">
                            <button class="btn btn-danger" onclick="$(this).parent().remove()">刪除</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="editProduct-name" class="form-label">產品名稱</label>
                <input type="text" value="{{ $product->name }}" class="form-control" id="editProduct-name" name="name">
            </div>
            <div class="mb-3">
                <label for="editProduct-name_in_french" class="form-label">產品法語名稱</label>
                <input type="text" value="{{ $product->name_in_french }}" class="form-control" id="editProduct-name_in_french" name="name_in_french">
            </div>
            <div class="form-floating">
                <textarea value="" class="form-control" placeholder="Leave a description here" id="editProduct-description" name="description">{{ $product->description }}</textarea>
                <label for="editProduct-description">描述</label>
            </div>
            <div class="form-floating">
                <textarea value="" class="form-control" placeholder="Leave a description here" id="editProduct-description" name="description_in_french">{{ $product->description_in_french }}</textarea>
                <label for="editProduct-description_in_french">法語描述</label>
            </div>
            <div class="mb-3">
                <label for="editProduct-brand" class="form-label">產品品牌名稱</label>
                <input type="text" value="{{ $product->brand }}" class="form-control" id="editProduct-brand" name="brand">
            </div>
            <div class="mb-3">
                <label for="editProduct-origin" class="form-label">產品原產國</label>
                <input type="text" value="{{ $product->origin }}" class="form-control" id="editProduct-origin" name="origin">
            </div>
            <div class="mb-3">
                <label for="editProduct-gross_weight" class="form-label">產品總重</label>
                <input type="number" value="{{ $product->gross_weight }}" class="form-control" id="editProduct-gross_weight" name="gross_weight">
            </div>
            <div class="mb-3">
                <label for="editProduct-net_content_weight" class="form-label">產品淨重</label>
                <input type="number" value="{{ $product->net_content_weight }}" class="form-control" id="editProduct-net_content_weight" name="net_content_weight">
            </div>
            <div class="mb-3">
                <label for="editProduct-weight_unit" class="form-label">產品重量單位</label>
                <input type="text" value="{{ $product->weight_unit }}" class="form-control" id="editProduct-weight_unit" name="weight_unit">
            </div>
        </div>
        <div class="modal-footer">
            
            <button type="submit" class="btn btn-primary">{{ $title }}</button>
            <a href="{{ route('admin.manage.product') }}" class="btn btn-secondary" >Close</a>
        </div>
    </form>
    
            
</div>

<script src="{{ asset('assets/jquery.min.js') }}"></script>
