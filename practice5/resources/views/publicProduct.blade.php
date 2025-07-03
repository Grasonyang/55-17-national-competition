
@extends('layout')
@section('main')
    <div class="container " id="main-container">
        <div class="d-flex align-items-center justify-content-between">
            <h2>產品公開展示</h2>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked">
                <label class="form-check-label" for="switchCheckChecked">顯示法文</label>
            </div>
        </div>
        <div id="showProduct">
            <img src="{{ asset($images->image_url) }}" alt="company image">
            <div class="content">
                <h2>公司名稱: {{ $product->company->name }}</h2>
                <h4>GTIN: {{ $product->gtin }}</h4>
                <p class="lang en">Description:  {{ $product->description }}</p>
                <p class="lang fh">Description:  {{ $product->description_in_f }}</p>
                <ul>
                    <li>weight: {{ $product->gross_weight }}.0 {{ $product->unit }}</li>
                    <li>net content weight: {{ $product->net_content_weight }}.0 {{ $product->unit }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".lang").hide();
        $(".en").show();
        $("input[type='checkbox']").on('change', function() {
            if ($(this).is(':checked')) {
                $(".en").hide();
                $(".fh").show();
            } else {
                $(".fh").hide();
                $(".en").show();
            }
        });
    </script>
@endsection
