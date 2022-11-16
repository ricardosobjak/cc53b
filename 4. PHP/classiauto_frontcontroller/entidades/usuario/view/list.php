<h2>Usuários</h2>


<table>
  <tr>
    <th>Nome</th>
    <th>Nascimento</th>
    <th>Cidade</th>
    <th>E-mail</th>
  </tr>

  <?php
    while ($usuario = mysqli_fetch_array($result)) :
  ?>
  <tr>
    <td><?= $usuario['nome'] ?></td>
    <td><?= $usuario['nascimento'] ?></td>
    <td><?= $usuario['cidade'] ?></td>
    <td><?= $usuario['email'] ?></td>
  </tr>
  <?php
    endwhile;
  ?>

</table>