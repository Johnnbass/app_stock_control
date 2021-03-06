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
    <script src="{{ asset('js/select_loader.js') }}" type="text/javascript"></script>
    <script>
        loadSelect(["vendor", "fornecedor"]);
        loadSelect(["category", "categoria"]);
    </script>
@endsection
