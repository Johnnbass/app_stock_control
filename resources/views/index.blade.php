@extends('layouts.app', ["current" => "home"])

@section('body')
    <h3>Controle de Estoque</h3>
    <p>
        Bem vindo ao seu sistema de controle de estoque.
        Aqui você pode gerenciar seus fornecedores, categorias, produtos e usuários.
    </p>
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Fornecedores</h5>
                        <p class="card-text">
                            Aqui você pode adicionar fornecedores
                        </p>
                        <a href="/fornecedores/novo" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Categorias</h5>
                        <p class="card-text">
                            Aqui você pode adicionar categorias
                        </p>
                        <a href="/categorias/novo" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Movimentação de Produtos</h5>
                        <p class="card-text">
                            Aqui você pode adicionar novos, repor o estoque ou fazer a baixa dos produtos
                        </p>
                        <a href="/produtos/novo" class="btn btn-primary">Novo</a>
                        <a href="/produtos/adicionar-produtos" class="btn btn-outline-success">Reposição</a>
                        <a href="/produtos/baixar-produtos" class="btn btn-outline-danger">Baixa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
