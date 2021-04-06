@extends('layouts.app', ["current" => "fornecedor"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('vendor._components.form_create_edit', ['id' => $id])
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/create_edit.js') }}" type="text/javascript"></script>
@endsection
