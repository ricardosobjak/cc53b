<style>
  input.invalid {
    border-color: red;
  }
</style>


<h2>
  Cadastro de Anúncio
</h2>

<form method="POST" action=".">
  <input type="hidden" name="action" value="salvar" />

  <input type="hidden" name="id" value="<?= @$anuncio["id"] ?>" />

  <label>Categoria</label>
  <select name="categoria">
    <option value=""></option>
    <?php
    foreach ($categorias as $cat) :
    ?>
      <option value="<?= $cat["id"] ?>" <?= ($cat["id"] == @$anuncio["categoria_id"]) ? "selected" : "" ?>><?= $cat["nome"] ?></option>
    <?php
    endforeach;
    ?>
  </select>

  <label>Marca</label>
  <select name=" marca">
    <option value=""></option>
    <?php
    foreach ($marcas as $marca) :
    ?>
      <option value="<?= $marca["id"]; ?>" <?= ($marca["id"] == @$anuncio["marca_id"]) ? "selected" : "" ?>><?= $marca["nome"]; ?></option>
    <?php
    endforeach;
    ?>

  </select>


  <label for="">Destaque</label>
  <input type="text" name="destaque" value="<?= @$anuncio["destaque"] ?>" />

  <label for="">Preço</label>
  <input type="number" name="preco" value="<?= @$anuncio["preco"] ?>" />

  <label for="">Descrição</label>
  <textarea name="descricao"><?= @$anuncio["descricao"] ?></textarea>

  <button type="submit" class="btn secundario">Confirmar</button>
</form>