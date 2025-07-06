{{-- 進階版本的圖片展示組件 --}}
<div class="mb-3">
    <label for="#addProduct-{{$product->gtin ?? null}}-files" class="form-label">產品照片</label>
    
    @if($product !== null && $product->product_images && $product->product_images->count() > 0)
        <div class="row g-3 mb-3" id="existing-images">
            @foreach($product->product_images as $index => $file)
                <div class="col-md-6 col-lg-4" data-image-id="{{ $file->id }}">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative overflow-hidden rounded-top">
                            <img src="{{ asset('storage/'.$file->img_url) }}" 
                                 class="card-img-top" 
                                 alt="產品圖片 {{ $index + 1 }}" 
                                 style="height: 180px; object-fit: cover; transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'">
                            
                            {{-- 刪除按鈕 --}}
                            <button type="button" 
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 opacity-75" 
                                    onclick="removeImage(this)"
                                    title="刪除圖片"
                                    style="border-radius: 50%; width: 32px; height: 32px; padding: 0;">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            
                            {{-- 主要圖片標記 --}}
                            @if($index === 0)
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">
                                    <i class="bi bi-star-fill"></i> 主要
                                </span>
                            @endif
                        </div>
                        
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">圖片 {{ $index + 1 }}</small>
                                <div class="btn-group btn-group-sm">
                                    @if($index !== 0)
                                        <button type="button" class="btn btn-outline-primary btn-sm" 
                                                onclick="setMainImage(this)" title="設為主要圖片">
                                            <i class="bi bi-star"></i>
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-outline-secondary btn-sm" 
                                            onclick="previewImage('{{ asset('storage/'.$file->img_url) }}')" 
                                            title="預覽">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" value="{{ $file->img_url }}" name="urls[]">
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-light border-2 border-dashed text-center py-4 mb-3">
            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
            <p class="text-muted mb-0 mt-2">目前沒有產品照片</p>
            <small class="text-muted">上傳圖片來展示您的產品</small>
        </div>
    @endif

    {{-- 文件上傳區域 --}}
    <div class="upload-area border-2 border-dashed rounded p-4 text-center mb-2" 
         style="border-color: #dee2e6; transition: all 0.3s ease;"
         ondrop="dropHandler(event)" 
         ondragover="dragOverHandler(event)"
         ondragleave="dragLeaveHandler(event)">
        
        <i class="bi bi-cloud-upload text-primary" style="font-size: 2rem;"></i>
        <p class="mb-2 mt-2">
            <strong>拖拽圖片到此處</strong> 或 
            <label for="addProduct-{{$product->gtin ?? null}}-files" class="text-primary text-decoration-underline" style="cursor: pointer;">
                點擊選擇文件
            </label>
        </p>
        <small class="text-muted">支援 JPG, PNG, GIF 格式，單個文件最大 5MB</small>
        
        <input type="file" 
               class="d-none" 
               id='addProduct-{{$product->gtin ?? null}}-files' 
               name='files[]' 
               multiple 
               accept="image/*"
               onchange="previewNewImages(this)">
    </div>
    
    {{-- 新上傳圖片預覽 --}}
    <div id="new-images-preview" class="row g-3" style="display: none;"></div>
</div>

{{-- 圖片預覽模態框 --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">圖片預覽</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="previewImage" class="img-fluid w-100" style="max-height: 70vh; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

<style>
.upload-area:hover {
    border-color: #0d6efd !important;
    background-color: #f8f9fa;
}

.upload-area.drag-over {
    border-color: #0d6efd !important;
    background-color: #e7f3ff;
}
</style>

<script>
// 移除圖片
function removeImage(button) {
    if (confirm('確定要刪除這張圖片嗎？')) {
        $(button).closest('.col-md-6, .col-lg-4').fadeOut(300, function() {
            $(this).remove();
        });
    }
}

// 設置主要圖片
function setMainImage(button) {
    // 移除其他主要標記
    $('.badge:contains("主要")').remove();
    $('.btn-outline-primary:contains("star")').removeClass('d-none');
    
    // 添加主要標記到當前圖片
    const card = $(button).closest('.card');
    const imageContainer = card.find('.position-relative');
    imageContainer.prepend('<span class="badge bg-primary position-absolute top-0 start-0 m-2"><i class="bi bi-star-fill"></i> 主要</span>');
    
    // 隱藏當前按鈕
    $(button).addClass('d-none');
}

// 預覽圖片
function previewImage(src) {
    $('#previewImage').attr('src', src);
    $('#imagePreviewModal').modal('show');
}

// 拖拽處理
function dragOverHandler(ev) {
    ev.preventDefault();
    $(ev.target).closest('.upload-area').addClass('drag-over');
}

function dragLeaveHandler(ev) {
    $(ev.target).closest('.upload-area').removeClass('drag-over');
}

function dropHandler(ev) {
    ev.preventDefault();
    $(ev.target).closest('.upload-area').removeClass('drag-over');
    
    const files = ev.dataTransfer.files;
    const input = $(ev.target).closest('.upload-area').find('input[type="file"]')[0];
    input.files = files;
    previewNewImages(input);
}

// 預覽新上傳的圖片
function previewNewImages(input) {
    const preview = $('#new-images-preview');
    preview.empty();
    
    if (input.files && input.files.length > 0) {
        preview.show();
        
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = $(`
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-success">
                            <div class="position-relative">
                                <img src="${e.target.result}" class="card-img-top" style="height: 180px; object-fit: cover;">
                                <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                    <i class="bi bi-plus-circle"></i> 新增
                                </span>
                                <button type="button" class="btn btn-outline-danger btn-sm position-absolute top-0 end-0 m-2" 
                                        onclick="$(this).closest('.col-md-6').remove()" title="移除">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <small class="text-success">
                                    <i class="bi bi-file-earmark-image"></i> ${file.name}
                                </small>
                            </div>
                        </div>
                    </div>
                `);
                preview.append(col);
            };
            reader.readAsDataURL(file);
        });
    } else {
        preview.hide();
    }
}
</script>
