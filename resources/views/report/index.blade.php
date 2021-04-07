@extends('layouts.app', ["current" => "relatorio"])

@section('body')
    <div class="card border">
        <div class="card-header">
            <h5 class="card-title">Registros</h5>
        </div>
        <div class="card-body">
            <div id="registry"></div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function loadData(id) {
            $.ajax({
                type: "GET",
                url: '/api/relatorio',
                dataType: "json",
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization", localStorage.getItem('_token'));
                },
                success: function(data) {
                    let n = 0;
                    let content = '';
                    for (a in data) {
                        content += `<div>
                                        <a href="#register_${a}" data-toggle="collapse">${a}</a>
                                        <div id="register_${a}" class="collapse">`;
                        // console.log(a);
                        for (b in data[a]) {
                            content += `<br><strong>Código do produto: ${b}</strong><br>`;
                            // console.log(b)
                            for (c in data[a][b]) {
                                content += `<br>Tipo de operação: ${c === 'add' ? 'inclusão' : 'baixa'}<br>`;
                                // console.log(c)
                                for (d of data[a][b][c]) {
                                    n += d;
                                }
                                content += `Quantidade movimentada: ${n}<br>`;
                                // console.log(n);
                                n = 0;
                            }
                        }
                        content += `    <br>
                                        </div>
                                    </div>`;
                    }
                    $('#registry').append(content);
                },
                complete: function(xhr, status) {
                    if (status === 'error') {
                        location.replace('/login');
                    }
                },
                error: function(xhr, status) {
                    const error = xhr.responseJSON;
                    console.error("Ocorreu um erro inesperado: " + error);
                    location.replace('/');
                }
            });
        }

        $(function() {
            loadData();
        });

    </script>
@endsection
