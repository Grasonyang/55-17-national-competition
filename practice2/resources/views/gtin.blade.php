@extends("layout")
@section("main")
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>公開 GTIN 批量驗證頁面</h2>
            <div class="d-flex">
                <input type="file" class="btn btn-primary">
                @include("form.inputGtin")
            </div>
        </div>
        <table class="table table-striped table-bordered mt-5">
            <thead>
                <tr>
                     <th colspan="2" scope="col" class="text-center">最終結果{{ $result }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Gtin</th>
                    <td>Result</td>
                </tr>
                @foreach($gtins as $gtin)
                    <tr>
                        <th scope="row">{{ $gtin['code'] }}</th>
                        <td>{{ $gtin['check'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script src="{{ asset('assets/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("input[type='file']").on('change', function () {
            let uploadedFile = this.files[0];
            if (uploadedFile) {
                let reader = new FileReader();
                reader.readAsText(uploadedFile);
                reader.onload = function (e) {
                    console.log(e.target.result.split("\r\n"));
                    gtins =e.target.result.split("\r\n");
                    link = "";
                    for(let i=1; i<gtins.length; i++){
                        link +=`gtin%5B%5D=${gtins[i]}&`
                    }
                    console.log(link);
                    location.href = "{{ route('gtin') }}?" + link;
                };
            }
        });
    });
</script>