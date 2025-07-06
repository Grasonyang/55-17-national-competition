<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct-{{$product->gtin ?? null}}">
  {{ $title }}
</button>

<!-- Modal -->
<div class="modal fade" id="addProduct-{{$product->gtin ?? null}}" tabindex="-1" aria-hidden="true">
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
                <label for="#addProduct-{{$product->gtin ?? null}}-user_id" class="form-label">選擇公司</label>
                <select class="form-select" aria-label="" name="company_id">
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-name" class="form-label">產品名稱</label>
                <input type="text" value="{{ $product->name ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-name' name='name'>
            </div>

            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-files" class="form-label">產品照片</label>
                @if($product !== null && $product->product_images && $product->product_images->count() > 0)
                    @foreach($product->product_images as $file)
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <input type="hidden" value="{{ $file->img_url }}" name="urls[]">
                            <img src="{{ $file->img_url }}" class="rounded mx-auto d-block w-25" alt="...">
                            <button onclick="$(this).parent().remove()">刪除</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">目前沒有產品照片</p>
                @endif
                
                


                <input type="file" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-files' name='files[]' multiple>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-name_in_f" class="form-label">產品法語名稱</label>
                <input type="text" value="{{ $product->name_in_f ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-name_in_f' name='name_in_f'>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-description" class="form-label">描述</label>
                <textarea class="form-control" placeholder="法語描述" id="#addProduct-{{$product->gtin ?? null}}-description" name='description'>
                    {{ $product->description ?? '' }}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-description_in_f" class="form-label">法語描述</label>
                <textarea class="form-control" placeholder="法語描述" id="#addProduct-{{$product->gtin ?? null}}-description_in_f" name='description_in_f'>
                    {{ $product->description_in_f ?? '' }}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-brand" class="form-label">產品品牌名稱</label>
                <input type="text" value="{{ $product->brand ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-brand' name='brand'>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-origin" class="form-label">產品原產國</label>
                <input type="text" value="{{ $product->origin ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-origin' name='origin'>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-weight" class="form-label">產品總重</label>
                <input type="number" value="{{ $product->weight ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-weight' name='weight'>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-net_weight" class="form-label">產品淨重</label>
                <input type="number" value="{{ $product->net_weight ?? '' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-net_weight' name='net_weight'>
            </div>
            <div class="mb-3">
                <label for="#addProduct-{{$product->gtin ?? null}}-weight_unit" class="form-label">產品重量單位</label>
                <input type="text" value="{{ $product->weight_unit ?? 'g' }}" class="form-control" id='#addProduct-{{$product->gtin ?? null}}-weight_unit' name='weight_unit'>
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