@extends('layouts.app', ["current" => "produto"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('product._components.form_add_sub', ['opType' => $opType])
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/select_loader.js') }}" type="text/javascript"></script>
    <script>
        loadSelect(["product", "produto"]);

        $(`#productForm`).submit(function(e) {
            e.preventDefault();

            const formData = $(this).serialize();
            const type = ($('#opType').val() === 'add') ? 'adicionar-produtos' : 'baixar-produtos';
            const endpoint = `/api/${type}`;
       
            $.ajax({
                type: "post",
                url: endpoint,
                data: formData,
                dataType: "json",
                complete: function(xhr, status) {
                    // console.log(xhr.responseJSON);
                    // alert('Debug')
                },
                success: function(response) {
                    alert(response.msg);
                    location.assign(`/produto`);
                },
                error: function(xhr) {
                    let ret = "";
                    let error = xhr.responseJSON.errors;

                    if (error) {
                        for (err in error) {
                            ret += "* " + error[err] + "\n";
                        }
                    } else {
                        ret = xhr.responseJSON.msg;
                    }
                    
                    alert(ret);
                }
            });
        });

    </script>
@endsection
