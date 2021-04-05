@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('category._components.form_create_edit')
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        
    </script>
@endsection
