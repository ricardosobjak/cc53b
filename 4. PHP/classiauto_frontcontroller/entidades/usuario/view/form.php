<style>
  input.invalid {
    border-color: red;
  }
</style>


<h2>
  Cadastro de usuário
</h2>

<?php if (@$message) : ?>
  <div><?= $message ?></div>
<?php endif; ?>

<form method="POST" action=".">
  <input type="hidden" name="action" value="salvar" />

  <div>
    <label>Nome</label>
    <input type="text" name="nome" placeholder="Fulano de Tal" value="<?= $usuario['nome'] ?? '' ?>" aria-invalid="<?= empty($usuario['nome']) ? 'true' : 'false' ?>" />
    <?php if ($hasErros && empty($usuario['nome'])) : ?>
      <span class="invalid" aria-invalid="true">Campo obrigatório</span>
    <?php endif; ?>
  </div>

  <div>
    <label>Nascimento</label>
    <input type="date" name="nascimento" placeholder="dd/mm/yyyy" />
  </div>

  <div>
    <label>E-mail</label>
    <input type="mail" name="email" placeholder="fulano@provedor.com.br" />
  </div>

  <div>
    <label>Telefone</label>
    <input type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" />
  </div>

  <div>
    <label>Cidade</label>
    <input type="text" name="cidade" />
  </div>

  <div>
    <label>UF</label>
    <input type="text" name="uf" />
  </div>

  <div>
    <label>País</label>
    <input type="text" name="pais" />
  </div>

  <div>
    <label>Senha</label>
    <input type="password" name="senha" />
  </div>

  <div>
    <label>Confirmar senha</label>
    <input type="password" name="senha2" />
  </div>

  <div>
    <button type="submit">Cadastrar</button>
  </div>
</form>