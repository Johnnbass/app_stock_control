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
            const date = getDateTime(data.created_at);
            let disabled = (data.products.length > 0) ? 'disabled' : '';

            let line = `<tr>
                            <td>${date.date} - ${date.time}</td>
                            <td>${data.name}</td>
                            <td>${data.description}</td>
                            <td>
                                <button class="btn btn-sm btn-secondary" onclick="editData(${data.id})">Editar</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteData(${data.id})" ${disabled}>Excluir</button>
                            </td>
                        </tr>`;
            return line;
        }

    </script>
@endsection
