@extends("layout")
@section("main")
    @include("manage.admin.form.editProduct", [
        "title"=>"修改產品",  
        "action"=>route("api.admin.manage.product.edit"),
        "method"=>"PUT",
        "product"=>$product,
        "companys"=>$companys,
    ])
@endsection
