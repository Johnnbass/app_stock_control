@extends('layouts.app', ['current' => 'home'])

@section('body')
    <h3>Controle de Estoque</h3>
    <p>
        Bem vindo ao seu sistema de controle de estoque.
        Aqui você pode gerenciar seus fornecedores, categorias, produtos e usuários.
    </p>
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Dashboard') }}</div>
                
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    {{ __('You are logged in!') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
