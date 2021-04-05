@extends('layouts.app', ["current" => "fornecedores"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @component('vendor._components.form_create_edit')
            @endcomponent
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        
    </script>
@endsection
