<html>

<head>
    <title>Controle de Estoque</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @component('.layouts._partials.header', ['current' => $current])
                @endcomponent
                <main role="main">
                    @hasSection('body')
                        @yield('body')
                    @endif
                </main>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $('#logout').click(function() {
            $.ajax({
                type: "POST",
                url: "/api/logout",
                dataType: "json",
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization", localStorage.getItem('_token'));
                },
                success: function(response) {
                    localStorage.removeItem('_token');
                    alert("Você saiu da aplicação");
                    location.replace('/');
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
        });

    </script>

    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>

</html>
