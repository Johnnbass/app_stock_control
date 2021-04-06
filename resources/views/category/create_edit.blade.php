@extends('layouts.app', ["current" => "categoria"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('category._components.form_create_edit', ['id' => $id])
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/create_edit.js') }}" type="text/javascript"></script>
@endsection
