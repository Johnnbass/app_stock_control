@extends('layouts.app', ["current" => "home"])

@section('body')
    <h3>Controle de Estoque</h3>
    <p>
        Bem vindo ao seu sistema de controle de estoque.
        Aqui você pode gerenciar seus fornecedores, categorias e produtos.
    </p>
    <div class="container">
        <div id="lowStockAlert"></div>
        <div class="row">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Fornecedores</h5>
                        <p class="card-text">
                            Aqui você pode adicionar fornecedores
                        </p>
                        <a href="/fornecedor/novo" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Categorias</h5>
                        <p class="card-text">
                            Aqui você pode adicionar categorias
                        </p>
                        <a href="/categoria/novo" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Movimentação de Produtos</h5>
                        <p class="card-text">
                            Aqui você pode adicionar novos, repor o estoque ou fazer a baixa dos produtos
                        </p>
                        <a href="/produto/novo" class="btn btn-primary">Novo</a>
                        <a href="/produto/adicionar-produtos" class="btn btn-outline-secondary">Reposição</a>
                        <a href="/produto/baixar-produtos" class="btn btn-outline-danger">Baixa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function verifyStock() {
            let alert = '';
            let alertMsg = '';
            let lowStock = 0;

            $.getJSON('/api/produto', function(data) {
                for (d of data) {
                    if (d.amount < 100) {
                        alertMsg += `* ${d.sku} - ${d.name}<br>`;
                        lowStock++;
                    }
                }

                alert = `<div class = "alert alert-danger" role = "alert" >
                            <strong>Atenção!</strong><br>
                            Os seguintes produtos encontram-se com o estoque baixo:<br>
                            ${alertMsg}
                        </div>`;
                console.log(data.length)
                if (lowStock > 0) {
                    $('#lowStockAlert').html(alert);
                }
            });
        }

        $(function() {
            verifyStock();
        });

    </script>
@endsection
