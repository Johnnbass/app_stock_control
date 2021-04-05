<form id="categoryForm">
  @csrf
  <input type="hidden" name="id" id="id" value="{{ $id ?? ''}}"/>
  <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name"
          placeholder="Nome" required maxlength="30" minlength="5" />
  </div>
  <div class="form-group">
      <label for="description">Descrição</label>
      <input type="text" class="form-control" name="description" id="description"
          placeholder="Descrição" maxlength="100" />
  </div>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button onclick="cancela()" class="btn btn-danger btn-sm">Cancelar</button>
</form>