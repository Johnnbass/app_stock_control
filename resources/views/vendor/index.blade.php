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
            const date = getDateTime(data.created_at);
            let disabled = (data.products.length > 0) ? 'disabled' : '';

            let line = `<tr>
                          <td>${date.date} - ${date.time}</td>
                          <td>${data.name}</td>
                          <td>${data.email}</td>
                          <td>${data.address}</td>
                          <td>
                              <button class="btn btn-sm btn-secondary" onclick="editData(${data.id})">Editar</button>
                              <button class="btn btn-sm btn-danger" onclick="deleteData(${data.id})" ${disabled}>Excluir</button>
                          </td>
                      </tr>`;
            return line;
        }

    </script>
@endsection
