<h2>
  Anúncios
</h2>


<table>
  <tr>
    <th>Categoria</th>
    <th>Marca</th>
    <th>Destaque</th>
    <th></th>
  </tr>

  <?php
  while ($anuncio = mysqli_fetch_array($result)) :
  ?>
    <tr>
      <td><?= $anuncio['categoria'] ?></td>
      <td><?= $anuncio['marca'] ?></td>
      <td><?= $anuncio['destaque'] ?></td>
      <td>
        <form action="." method="GET" style="display: inline;">
          <input type="hidden" name="action" value="editar" />
          <input type="hidden" name="id" value="<?= $anuncio["id"] ?>" />
          <button class="bnt-action">Editar</button>
        </form>

        <form action="." method="POST" style="display: inline;">
          <input type="hidden" name="action" value="excluir" />
          <input type="hidden" name="id" value="<?= $anuncio["id"] ?>" />
          <button class="bnt-action">Excluir</button>
        </form>
      </td>
    </tr>
  <?php
  endwhile;
  ?>

</table>