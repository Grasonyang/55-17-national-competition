<div class="modal fade" id="showProduct-{{ $product->gtin_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">產品詳細資料</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card">

                <img src="{{ asset('storage/' . ($product->product_image->first()?->image_path ?? 'product_image/default.jpg')) }}" alt="{{ $product->product_image->first()?->image_path }}">
                <div class="form-check">
                    <input class="form-check-input lang-toggle" type="radio"
                        name="radioDefault-{{ $product->gtin }}"
                        id="radioDefault1-{{ $product->gtin }}"
                        data-gtin="{{ $product->gtin }}"
                        value="zh"
                        checked>
                    <label class="form-check-label" for="radioDefault1-{{ $product->gtin }}">中文</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input lang-toggle" type="radio"
                        name="radioDefault-{{ $product->gtin }}"
                        id="radioDefault2-{{ $product->gtin }}"
                        data-gtin="{{ $product->gtin }}"
                        value="fr">
                    <label class="form-check-label" for="radioDefault2-{{ $product->gtin }}">Franch</label>
                </div>

                <div class="card-body">
                    <h3 class="card-title">
                        <span id="product-name-zh-{{ $product->gtin }}">{{ $product->name }}</span>
                        <span id="product-name-fr-{{ $product->gtin }}" style="display: none">{{ $product->name_in_french }}</span>
                    </h3>
                    <p class="card-text">
                        <span id="product-desc-zh-{{ $product->gtin }}">{{ $product->description }}</span>
                        <span id="product-desc-fr-{{ $product->gtin }}" style="display: none">{{ $product->description_in_french }}</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('.lang-toggle').forEach(function(radio) {
    radio.addEventListener('change', function() {
        const gtin = this.dataset.gtin;
        const lang = this.value;

        // 中文
        document.getElementById('product-name-zh-' + gtin).style.display = (lang === 'zh') ? '' : 'none';
        document.getElementById('product-desc-zh-' + gtin).style.display = (lang === 'zh') ? '' : 'none';

        // 法文
        document.getElementById('product-name-fr-' + gtin).style.display = (lang === 'fr') ? '' : 'none';
        document.getElementById('product-desc-fr-' + gtin).style.display = (lang === 'fr') ? '' : 'none';
    });
});
</script>
