@extends("layout")
@section("main")
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="" alt="" class="w-100 product-image">
            </div>
            <div class="col-12 col-md-8">
                <h2 class="ln1 title1">Product name</h2>
                <h2 class="ln2 title2">Product name(French)</h2>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="" id="checkNativeSwitch" switch>
                    <label class="form-check-label" for="checkNativeSwitch">
                        法文顯示
                    </label>
                </div>
                <p class="mt-3">
                    <h3 class="ln1">Description</h3>
                    <span class="ln1 description1"></span>
                    <h3 class="ln2">Description(French)</h3>
                    <span class="ln2 description2"></span>
                </p>
            </div>
        </div>
    </div>
@endsection

<script src="{{ asset('assets/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url:"{{ route('api.public.product', ['gtin' => $gtin]) }}",
            method:"GET",
            success:function(e){
                let product = e.product;
                $(".title1").text(product.name);
                $(".title2").text(product.name_in_french);
                $(".description1").text(product.description);
                $(".description2").text(product.description_in_french);
                
                $(".product-image").attr("src", "{{ asset('storage') }}/" + product.show_image);
                $(".ln2").hide();
            },
            
            error:function(e){
                alert("產品不存在");
            }
        })
        $("#checkNativeSwitch").change(function() {
            if($(this).is(":checked")){
                $(".ln1").hide();
                $(".ln2").show();
                
            }else{
                $(".ln2").hide();
                $(".ln1").show();
                
            }
        });
    });
</script>