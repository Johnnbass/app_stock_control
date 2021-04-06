@extends('layouts.app', ["current" => "produto"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('product._components.form_create_edit', ['id' => $id])
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/create_edit.js') }}" type="text/javascript"></script>
    <script>
        function loadSelect(select) {
            $.getJSON(`/api/${select[1]}`, function(data) {
                for (let i = 0; i < data.length; i++) {
                    option = `<option value="${data[i].id}">${data[i].name}</option>`;
                    $(`#${select[0]}_id`).append(option);
                }
            });
        }
        loadSelect(["vendor", "fornecedor"]);
        loadSelect(["category", "categoria"]);
    </script>
@endsection
