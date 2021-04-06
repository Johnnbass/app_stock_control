<nav class="navbar navbar-expand-lg navbar-dark bg-secondary rounded">
    <button 
      class="navbar-toggler" 
      type="button" 
      data-toggle="collapse" 
      data-target="#navbar" 
      aria-controls="navbar"
      aria-expanded="false" 
      aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if ($current == 'home') class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/">Home </a>
            </li>
            <li @if ($current == 'produto') class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/produto">Produtos</a>
            </li>
            <li @if ($current == 'categoria') class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/categoria">Categorias </a>
            </li>
            <li @if ($current == 'fornecedor') class="nav-item active" @else class="nav-item" @endif>
              <a class="nav-link" href="/fornecedor">Fornecedores </a>
          </li>
        </ul>
    </div>
</nav>
