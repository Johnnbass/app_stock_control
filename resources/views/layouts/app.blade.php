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
        @component('.layouts._partials.header', ['current' => $current])
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>

</html>
