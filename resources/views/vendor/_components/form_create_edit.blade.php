<form id="vendorForm">
  @csrf
  <input type="hidden" name="id" id="id" value="{{ $id ?? ''}}"/>
  <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name"
          placeholder="Nome" required maxlength="50" minlength="5" />
  </div>
  <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email"
          placeholder="E-mail" required />
  </div>
  <div class="form-group">
      <label for="address">Endereço</label>
      <input type="text" class="form-control" name="address" id="address"
          placeholder="Endereço" required maxlength="200" minlength="10" />
  </div>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  <button onclick="cancela()" class="btn btn-danger btn-sm">Cancelar</button>
</form>