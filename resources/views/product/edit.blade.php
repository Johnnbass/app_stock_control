@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('product._components.form_create_edit')
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        
    </script>
@endsection