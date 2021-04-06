<form id="productForm">
  @csrf
  <input type="hidden" name="id" id="id" value="{{ $id ?? ''}}"/>
  <div class="form-group">
    <label for="vendor_id">Fornecedor</label>
    <select class="form-control" name="vendor_id" id="vendor_id">
        <option value="">Selecione o fornecedor</option>
    </select>
  </div>
  <div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" name="category_id" id="category_id">
        <option value="">Selecione a categoria</option>
    </select>
  </div>
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name"
        placeholder="Nome" required maxlength="50" minlength="5" />
  </div>
  <div class="form-group">
      <label for="description">Descrição</label>
      <input type="text" class="form-control" name="description" id="description"
          placeholder="Descrição" required maxlength="100" minlength="10" />
  </div>
  <div class="form-group">
    <label for="amount">Quantidade</label>
    <input type="number" class="form-control" name="amount" id="amount"
        placeholder="Quantidade" min="0" value="0" />
  </div>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button onclick="location.assign('/produto')" class="btn btn-danger btn-sm">Cancelar</button>
</form>