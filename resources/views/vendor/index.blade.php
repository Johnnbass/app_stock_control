@extends('layouts.app', ["current" => "fornecedor"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <a href="/fornecedor/novo" class="btn btn-sm btn-primary" role="button">Novo fornecedor</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Fornecedores</h5>
            <small style="color:red;">* Fornecedores com produtos cadastrados não podem ser excluídos</small>
            <table class="table table-ordered table-hover" id="vendorTable">
                <thead>
                    <tr>
                        <th>Data do Cadastro</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
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
    <script>
        function mountLine(data) {
            let date = new Date(data.created_at);
            let time = null;
            let disabled = (data.products.length > 0) ? 'disabled' : '';

            time =
                (date.getHours() < 10 ? "0" + date.getHours() : date.getHours()) +
                ":" +
                (date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes());
            date =
                (date.getDate() < 10 ? "0" + date.getDate() : date.getDate()) +
                "/" +
                (date.getMonth() < 10 ? "0" + date.getMonth() : date.getMonth()) +
                "/" +
                date.getFullYear();

            let line = `<tr>
                          <td>${date} - ${time}</td>
                          <td>${data.name}</td>
                          <td>${data.email}</td>
                          <td>${data.address}</td>
                          <td>
                              <button class="btn btn-sm btn-warning" onclick="editData(${data.id})">Editar</button>
                              <button class="btn btn-sm btn-danger" onclick="deleteData(${data.id})" ${disabled}>Excluir</button>
                          </td>
                      </tr>`;
            return line;
        }

    </script>
@endsection
