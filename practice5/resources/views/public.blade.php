
@extends('layout')
@section('main')
    <div class="container">
        <input type="file" id="fileInput">
        <table class="table">
            <thead>
                <th colspan="2">結果:</th>
                <th id="result"></th>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">檢查碼</th>
                    <th>檢查結果</th>
                </tr>
                
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
         $("#fileInput").on('change',function(e){
            let $file = $(this)[0].files[0];
            if($file){
                let reader = new FileReader();
                reader.readAsText($file);
                reader.onload=function(e){
                    console.log(e.target.result);
                    let data = e.target.result.split('\n');
                    data.shift();
                    for(let i=0;i<data.length;i++){
                        data[i] = data[i].trim();
                    }
                    console.log(data);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        method:"post",
                        url:"{{ route('public.check') }}",
                        data:{
                            gtin:data
                        },
                        success:function(e){
                            console.log(e);
                            let reuslt = e.result;
                            let gtins = reuslt.gtins;
                            $("#result").text(`all valid: ${reuslt.all_valid}`);
                            $(".thegitn").remove();
                            for(let i=0;i<gtins.length;i++){
                                let key = Object.keys(gtins[i])[0]
                                $("tbody").append(`
                                    <tr class="thegitn">
                                        <td  colspan="2">${key}</td>
                                        <td>${gtins[i][key]}</td>
                                    </tr>
                                `);
                            }
                        },
                    });
                }
            }
        });
    </script>
@endsection
