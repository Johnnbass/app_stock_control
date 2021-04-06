@extends('layouts.app', ["current" => "produto"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/produto/novo" class="btn btn-sm btn-primary" role="button">Novo produto</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <table class="table table-ordered table-hover" id="productTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Fornecedor</th>
                        <th>Categoria</th>
                        <th>SKU</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th style="width:15%">Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/list.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        function mountLine(data) {
            let date = new Date(data.created_at);
            let time = null;

            time = ((date.getHours() < 10) ? '0' + date.getHours() : date.getHours()) + ':' + ((date.getMinutes() < 10) ?
                '0' + date.getMinutes() : date.getMinutes());
            date = ((date.getDate() < 10) ? '0' + date.getDate() : date.getDate()) + '/' + ((date.getMonth() < 10) ? '0' +
                date.getMonth() : date.getMonth()) + '/' + date.getFullYear();

            let line = `<tr>
                            <td>${date} - ${time}</td>
                            <td>${data.vendor.name}</td>
                            <td>${data.category.name}</td>
                            <td>${data.sku}</td>
                            <td>${data.name}</td>
                            <td>${data.description}</td>
                            <td>${data.amount}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editData(${data.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteData(${data.id})">Excluir</button>
                            </td>
                        </tr>`;
            return line;
        }
    </script>
@endsection
