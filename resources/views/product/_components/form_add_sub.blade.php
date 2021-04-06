<form id="productForm">
  @csrf
  <input type="hidden" name="id" id="id" value="{{ $id ?? ''}}"/>
  <div class="form-group">
    <label for="product_id">Produto</label>
    <select class="form-control" name="product_id" id="product_id">
        <option value="">Selecione o produto</option>
    </select>
  </div>
  <div class="form-group">
    <label for="amount">Quantidade</label>
    <input type="number" class="form-control" name="amount" id="amount"
        placeholder="Quantidade" min="1" value="1"/>
  </div>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button onclick="location.assign('/produto')" class="btn btn-danger btn-sm">Cancelar</button>
</form>