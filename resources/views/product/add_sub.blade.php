@extends('layouts.app', ["current" => "produto"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('product._components.form_add_sub')
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/create_edit.js') }}" type="text/javascript"></script>
@endsection
