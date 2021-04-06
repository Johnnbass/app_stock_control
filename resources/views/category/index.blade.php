@extends('layouts.app', ["current" => "categoria"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/categoria/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            <small style="color:red;">* Categorias com produtos cadastrados não podem ser excluídas</small>
            <table class="table table-ordered table-hover" id="categoryTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Nome</th>
                        <th>Descrição</th>
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
            let disabled = (data.products.length > 0) ? 'disabled' : '';

            time = ((date.getHours() < 10) ? '0' + date.getHours() : date.getHours()) + ':' + ((date.getMinutes() < 10) ?
                '0' + date.getMinutes() : date.getMinutes());
            date = ((date.getDate() < 10) ? '0' + date.getDate() : date.getDate()) + '/' + ((date.getMonth() < 10) ? '0' +
                date.getMonth() : date.getMonth()) + '/' + date.getFullYear();

            let line = `<tr>
                            <td>${date} - ${time}</td>
                            <td>${data.name}</td>
                            <td>${data.description}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="editData(${data.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteData(${data.id})" ${disabled}>Excluir</button>
                            </td>
                        </tr>`;
            return line;
        }
    </script>
@endsection
