@extends('layouts.app', ["current" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            <table class="table table-ordered table-hover table-striped" id="categoriesTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        
    </script>
@endsection