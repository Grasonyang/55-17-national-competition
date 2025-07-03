<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $type }}-{{ $product->gtin ?? '' }}">
  {{ $title }}
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $type }}-{{ $product->gtin ?? '' }}" tabindex="-1" aria-hidden="true">
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
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-file" class="form-label">選擇公司</label>
                        @if($companies!==null)
                            <select name="company_id">
                                @foreach($companies as $company)
                                    <option value="{{ $company->gtin }}">
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="hidden" name="company_id" value="{{ $company_id ?? '' }}">
                            {{ $company_id ?? '' }}
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-file" class="form-label">產品圖片</label>
                        <input type="file" value="{{ $product->file ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-file" name="file[]" multiple>
                    </div>
                    <div class="mb-3">
                        @if($product!=null)
                            @foreach($product->images() as $image)
                                <div>
                                    <input type="hidden" name="images[]">
                                    <img src="{{ asset('storage/'.$image->image_url ) }}" alt="">
                                    <button onclick="$(this).parent().remove()">刪除</button>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-name" class="form-label">產品名稱</label>
                        <input type="text" value="{{ $product->name ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-name_in_f" class="form-label">產品法語名稱</label>
                        <input type="text" value="{{ $product->name_in_f ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-name_in_f" name="name_in_f">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-description" class="form-label">描述</label>
                        <textarea class="form-control" name="description" id="{{ $type }}-{{ $product->gtin ?? '' }}-description">
                            {{ $product->description ?? '' }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-description_in_f" class="form-label">法語描述</label>
                        <textarea class="form-control" name="description_in_f" id="{{ $type }}-{{ $product->gtin ?? '' }}-description_in_f">
                            {{ $product->description_in_f ?? '' }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-brand" class="form-label">產品品牌名稱</label>
                        <input type="text" value="{{ $product->brand ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-brand" name="brand">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-origin" class="form-label">產品原產國</label>
                        <input type="text" value="{{ $product->origin ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-origin" name="origin">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-gross_weight" class="form-label">產品總重</label>
                        <input type="number" value="{{ $product->gross_weight ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-gross_weight" name="gross_weight">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-net_content_weight" class="form-label">產品淨重</label>
                        <input type="number" value="{{ $product->net_content_weight ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-net_content_weight" name="net_content_weight">
                    </div>
                    <div class="mb-3">
                        <label for="{{ $type }}-{{ $product->gtin ?? '' }}-unit" class="form-label">產品重量單位</label>
                        <input type="text" value="{{ $product->unit ?? '' }}" class="form-control" id="{{ $type }}-{{ $product->gtin ?? '' }}-unit" name="unit">
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