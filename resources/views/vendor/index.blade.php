@extends('layouts.app', ["current" => "fornecedores"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/fornecedores/novo" class="btn btn-sm btn-primary" role="button">Novo fornecedor</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Fornecedores</h5>
            <table class="table table-ordered table-hover table-striped" id="vendorsTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
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