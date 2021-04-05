@extends('layouts.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo produto</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table table-ordered table-hover table-striped" id="productsTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Fornecedor</th>
                        <th>Categoria</th>
                        <th>SKU</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
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