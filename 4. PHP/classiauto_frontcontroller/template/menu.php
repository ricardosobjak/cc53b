<?php
include_once approot() . 'entidades/categoria/db.php';
$categoriaDAO = new CategoriaDAO($_conn);
//if (isset($_SESSION['classiauto_user_id'])) :
?>
<div class="titulo">
  Meus Links
</div>
<ul>
  <li><a href="<?= webroot() ?>entidades/anuncio/">Anúncios</a></li>
  <li><a href="<?= webroot() ?>entidades/anuncio/?action=novo">Quero anunciar</a></li>
</ul>
<?php //endif;
?>

<div class="titulo">
  Categorias
</div>
<ul>
  <?php


  $categorias = $categoriaDAO->getAll();
  #while ($cat = mysqli_fetch_array($categorias)) :
  while ($cat = $categorias->fetch_array()) :
  ?>
    <li><a href="<?= webroot() ?>?categoria=<?= $cat['id'] ?>"><?= $cat["nome"] ?></a></li>
  <?php
  endwhile;
  ?>
</ul>